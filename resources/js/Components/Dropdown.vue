<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';
const emit = defineEmits(['update:modelValue']);
const props = defineProps({
    modelValue: {
        type: [String, Number],
        default: '',
    },
    options: {
        type: Array,
        default: [],
    },
    classes: {
        type: String,
        default: '',
    },
});

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const open = ref(false);
</script>

<template>
    <div class="relative">
        <div @click="open = !open" class="dropdown content-center">
            <div class="pl-3 text-left text-[14px]">
                {{ options.find((item) => item.value === modelValue).title }}
            </div>
        </div>
        <div
            v-show="open"
            class="fixed inset-0 z-40"
            @click="open = false"
        ></div>
        <!-- Full Screen Dropdown Overlay -->
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="z-[41] absolute left-0 right-0 top-16 rounded-lg bg-white shadow-lg"
                @click="open = false"
            >
                <div class="rounded-md" :class="classes">
                    <div class="dropdown-list">
                        <div
                            @click="emit('update:modelValue', item.value)"
                            v-for="(item, index) in options"
                            :key="item.value + index"
                            class="cursor-pointer px-3 py-1 text-center text-dark hover:bg-primary hover:text-white"
                        >
                            {{ item.title }}
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </div>
</template>
<style lang="scss" scoped>
.dropdown {
    position: relative;
    margin-right: auto;
    margin-left: auto;
    width: 100%;
    height: 32px;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    color: #000;
    background-color: #fff;
    border: none;
    border-radius: 16px;
    box-shadow: 0 0 10px rgb(30, 66, 144, 0.25);
    cursor: pointer;
    &::before {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 9px;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
        width: 16px;
        height: 16px;
        background-color: var(--theme-color);
        border-radius: 50%;
        pointer-events: none;
    }
    &::after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 13px;
        bottom: 0;
        margin-top: auto;
        margin-right: 1px;
        margin-bottom: auto;
        width: 6px;
        height: 6px;
        border-right: solid 1px #fff;
        border-bottom: solid 1px #fff;
        transform: rotate(45deg);
        pointer-events: none;
    }
}
.dropdown-list {
    div:first-child {
        border-top-left-radius: theme('borderRadius.lg');
        border-top-right-radius: theme('borderRadius.lg');
    }
    div:last-child {
        border-bottom-left-radius: theme('borderRadius.lg');
        border-bottom-right-radius: theme('borderRadius.lg');
    }
}
</style>
