<script setup>
const props = defineProps({
    headers: {
        type: Array,
        default: [],
    },
    data: {
        type: Array,
        default: [],
    },
    paging: {
        type: Object,
        default: {},
    },
    isAction: {
        type: Boolean,
        default: false
    },
   
});
</script>
<template>
    <table class="table-auto">
        <thead>
            <tr>
                <th
                    :style="`--width: ${header.width ? header.width + 'px' : ''}`"
                    :class="[{ 'header-item': !$slots.headerItem }]"
                    v-for="(header, index) in headers"
                    :key="index + header"
                >
                    <div v-if="$slots.headerItem" class="card-header">
                        <slot name="headerItem" :data="header"></slot>
                    </div>
                    <div v-else class="text-[12px] font-normal">
                        {{ header.title }}
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="rows"
                v-for="(item, index) in data"
                :key="`body-table-${index}-${item}`"
            >
                <td
                    class="columns"
                    v-for="[key, value] in Object.entries(item)"
                    :key="key + value"
                >
                    <div
                        v-if="$slots[key]"
                        :class="{
                            'columns__multi-value': Array.isArray(value),
                        }"
                    >
                        <slot :name="key" :data="item"></slot>
                    </div>
                    <div v-else class="text-[14px]">
                        {{ value }}
                    </div>
                </td>
                <td class="columns" v-if="isAction">
                    <div class="columns__multi-value columns__action">
                        <slot name="action" :data="item"></slot>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<style lang="scss">
table {
    border: 1px solid theme('colors.grey');
    width: 100%;
}
.header-item {
    background-color: theme('colors.table.100');
    height: 31px;
    width: var(--width);
    &:not(:last-child) {
        border-right: 1px solid theme('colors.white');
    }
}
.rows {
    &:not(:last-child) {
        border-bottom: 1px solid theme('colors.grey');
    }
    &:nth-child(even) {
        .columns__multi-value {
            background-color: theme('colors.table.100');
        }
    }
    &:nth-child(odd) {
        .columns__multi-value {
            background-color: theme('colors.table.200');
        }
    }
    .columns {
        text-align: center;
        color: theme('colors.dark');
        &:not(:has(.columns__multi-value)) {
            padding: 10px 13px 10px 13px;
        }
        &:not(:last-child) {
            border-right: 1px solid theme('colors.grey');
        }
        .columns__multi-value {
            div:not(:last-child) {
                border-bottom: 1px solid theme('colors.grey');
            }
        }
        .columns__action {
            background-color: theme('colors.white');
        }

    }
    .action {
        div:not(:last-child) {
            border-bottom: 1px solid theme('colors.grey');
        }
    }
}
</style>
