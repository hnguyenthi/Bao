<script setup>
import { computed } from 'vue';
const props = defineProps({
    type: {
        type: String,
        default: '',
    },
    classes: {
        type: String,
        default: '',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    click: {
        type: Function,
        default: () => {},
    },
});
const bgButton = computed(() =>
    !props.type ? 'bg-info-100' : props.type === 'info' ? `bg-${props.type}-100` : `bg-${props.type}`);
</script>
<template>
    <button
        @click="click"
        class="inline-flex w-full items-center rounded-md border  px-4 py-2 text-center font-semibold  text-white   focus:outline-none hover:opacity-70"
        :class="[classes, bgButton]"
    >
        <div class="w-full text-center">
            <slot />
        </div>
    </button>
</template>
