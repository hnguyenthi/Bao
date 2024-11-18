<script setup>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { ja } from 'date-fns/locale';
import { ref } from 'vue';
import CalendarMonth from 'vue-material-design-icons/CalendarMonth.vue';
import ChevronLeft from 'vue-material-design-icons/ChevronLeft.vue';
import ChevronRight from 'vue-material-design-icons/ChevronRight.vue';

const model = defineModel();
const props = defineProps({
    type: {
        type: String,
        default: 'month-picker',
    },
});
const format = (date) => {
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    if (props.type === 'month-picker') return `${year}年 ${month}月`;
    if (props.type === 'year-picker') return `${year}年`;
};
const handlePre = () => {
    if (props.type === 'month-picker') {
        if (model.value.month === 0) {
            model.value.month = 11;
            model.value.year -= 1;
        } else {
            model.value.month -= 1;
        }
    } else if (props.type === 'year-picker') {
        model.value -= 1;
    }
};
const handleNext = () => {
    if (props.type === 'month-picker') {
        if (model.value.month === 11) {
            model.value.month = 0;
            model.value.year += 1;
        } else {
            model.value.month += 1;
        }
    } else if (props.type === 'year-picker') {
        model.value += 1;
    }
};
</script>
<template>
    <div class="datepicker flex text-primary">
        <ChevronLeft
            class="flex cursor-pointer content-center"
            @click="handlePre"
        />
        <div class="">
            <VueDatePicker
                v-model="model"
                :month-picker="type === 'month-picker' ? true : false"
                :year-picker="type === 'year-picker' ? true : false"
                :format-locale="ja"
                :format="format"
                auto-apply
            >
                <template #action-buttons> </template>
                <template #clear-icon> </template>
                <template #input-icon>
                    <CalendarMonth />
                </template>
            </VueDatePicker>
        </div>
        <ChevronRight
            class="flex cursor-pointer content-center"
            @click="handleNext"
        />
    </div>
</template>
<style lang="scss" scoped>
.material-design-icon {
    font-size: 32px;
    color: theme('colors.primary');
}
</style>
