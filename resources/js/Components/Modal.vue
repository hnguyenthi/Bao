<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    closeable: {
        type: Boolean,
        default: true,
    },
    type: {
        type: String,
        default: 'info',
    },
});

const emit = defineEmits(['close', 'yes', 'no']);

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = null;
        }
    },
);

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};
</script>

<template>
    <Teleport to="body">
        <Transition leave-active-class="duration-200">
            <div
                v-show="show"
                class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
                scroll-region
            >
                <Transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div
                        v-show="show"
                        class="fixed inset-0 transform transition-all"
                        @click="close"
                    >
                        <div class="absolute inset-0 bg-grey opacity-70" />
                    </div>
                </Transition>

                <Transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div
                        v-show="show"
                        class="absolute left-1/2 top-1/2 mb-6 w-full max-w-[478px] -translate-x-1/2 -translate-y-1/2 transform overflow-hidden rounded-lg bg-white shadow-xl transition-all"
                    >
                        <div class="w-full max-w-[478px]">
                            <div
                                class="modal-icon mt-[32px]"
                                :class="`modal-icon__${type}`"
                            ></div>
                            <div class="text-info-500 font-medium">
                                <slot v-if="show" />
                            </div>
                            <div
                                class="mt-[13px] flex justify-end px-[16px] py-[13px]"
                            >
                                <PrimaryButton
                                    @click="emit('no')"
                                    class="m-[5px] px-[24px] py-[10px] text-[14px] font-semibold"
                                    >いいえ</PrimaryButton
                                >
                                <PrimaryButton
                                    @click="emit('yes')"
                                    class="m-[5px] px-[24px] py-[10px] text-[14px] font-semibold"
                                    >はい
                                </PrimaryButton>
                            </div>
                        </div>
                    </div>
                </Transition>
            </div>
        </Transition>
    </Teleport>
</template>
<style lang="scss" scoped>
.modal-icon {
    width: 80px;
    height: 80px;
    border-width: 4px;
    border-style: solid;
    border-radius: 50%;
    padding: 0;
    position: relative;
    box-sizing: content-box;
    margin: 20px auto;
    &__info {
        border-color: theme('colors.info.400');
        &::before {
            content: '';
            position: absolute;
            left: 50%;
            background-color: theme('colors.info.400');
            width: 5px;
            height: 29px;
            bottom: 17px;
            border-radius: 2px;
            margin-left: -2px;
        }
        &::after {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -3px;
            top: 19px;
            content: '';
            position: absolute;
            left: 50%;
            background-color: theme('colors.info.400');
        }
    }
}
</style>
