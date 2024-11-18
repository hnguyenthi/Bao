<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    type: {
        type: String,
        default: 'text',
    },
    placeholder: {
        type: String,
        default: '',
    },
    classes: {
        type: String,
        default: '',
    },
    label: {
        type: String,
        default: ''
    },
    error: {
        type: String,
        default: ''
    },
});
const model = defineModel();
const input = ref(null);
const currentType = ref(props.type);
onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
const handleChangeType = () => {
    if (props.type !== 'password') return;
    if (currentType.value === 'password') {
        currentType.value = 'text';
    } else {
        currentType.value = 'password';
    }
};
</script>

<template>
<div>
    <label class="block text-h6 font-bold text-gray-700 mb-[5px]">
        <span v-if="label">{{ label }}</span>
    </label>
    <div class="relative">
        <input
            :placeholder="placeholder ?? ''"
            class="h-[60px] w-full rounded-sm border-2 border-info-200 focus:border-info-300 focus-visible:border-info-300"
            :class="classes"
            v-model="model"
            :type="currentType"
            ref="input"
        />
        <img
            v-if="type === 'password'"
            @click="handleChangeType"
            class="absolute right-0 top-1/2 -translate-x-1/2 -translate-y-1/2 transform cursor-pointer"
            src="@assets/images/common/icon-eyes.svg"
            alt="icon-eye"
        />
    </div>
    <div v-show="error">
        <p class="text-sm text-red">
            {{ error }}
        </p>
    </div>
</div>
    
</template>
<style lang="scss" scoped></style>
