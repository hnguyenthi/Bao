<script setup>
import Table from '@/Components/Table.vue';
import { formatPrice } from '@utils';

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
});
</script>
<template>
    <div>
        <Table class="w-auto" :headers="headers" :data="data">
            <!-- <template #headerItem="{data}">{{data}}</template> -->
            <template #income="{ data }">
                <div
                    v-for="(item, index) in data.income"
                    :key="index + item"
                >
                    <p class="px-5 py-2">{{ item.title }}</p>
                </div>
            </template>
            <template #price="{ data }">
                <div
                   
                    class="font-semibold"
                >
                    <p class="px-5 py-2 text-right">
                        {{ formatPrice(data.price) }}
                    </p>
                </div>
            </template>
        </Table>
    </div>
</template>
