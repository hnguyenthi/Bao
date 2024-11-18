<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue';
import { ref, computed } from 'vue';
import DatePicker from '@/Components/DatePicker.vue';
import MenuDown from 'vue-material-design-icons/MenuDown.vue';
import BarChart from '@/Components/BarChart.vue';
import Doughnut from '@/Components/DoughnutChart.vue'

const date = ref();
const breadcrumbs = ref([
    {
        title: 'ホーム',
        link: 'top',
    },
    {
        title: '物件管理・分析',
        link: 'paidAnalysisDashboard',
    },
]);
const month = ref({
    month: new Date().getMonth(),
    year: new Date().getFullYear(),
});
const year = ref(new Date().getFullYear());
const format = (date) => {
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    return `${year}年 ${month}月`;
};

const tab = ref('month');
const showTab = (value) => {
    tab.value = value;
};

const labels = ref([
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ]
);

const data = computed(() => {
    let counts = [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
    return counts
});
</script>
<template>
    <div>
        <Breadcrumb :breadcrumbs="breadcrumbs"></Breadcrumb>
        <div class="container mx-auto pb-[60px] pt-[35px]">
            <h2 class="text-h2 font-medium">物件管理・分析</h2>
            <div class="paid-analysis__content">
                <div class="grid h-[54px] grid-cols-2 gap-0">
                    <div
                        @click="showTab('month')"
                        class="paid-analysis__tab flex cursor-pointer content-center items-center justify-center rounded-t-md text-h5 font-semibold"
                        :class="{ 'tab-active': tab === 'month' }"
                    >
                        月表示
                    </div>
                    <div
                        @click="showTab('year')"
                        :class="{ 'tab-active': tab === 'year' }"
                        class="paid-analysis__tab flex cursor-pointer content-center items-center justify-center rounded-t-md text-h5 font-semibold"
                    >
                        <span> 年表示 </span>
                    </div>
                </div>
                <div class="py-5">
                    <div class="flex justify-center">
                        <div class="max-w-[242px]">
                            <DatePicker
                                v-if="tab === 'month'"
                                v-model="month"
                                type="month-picker"
                            />
                            <DatePicker
                                v-else
                                v-model="year"
                                type="year-picker"
                            />
                        </div>
                    </div>

                    <div>
                        <BarChart />
                    </div>
                    <div>
                        <Doughnut />
                    </div>
                    <div>Table</div>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.tab-active {
    border-top: 5px solid theme('colors.primary');
    height: 64px;
    background-color: theme('colors.white');
    color: theme('colors.primary');
}
.paid-analysis__tab:not(.tab-active) {
    height: 54px;
    margin-top: 10px;
    background-color: theme('colors.primary');
    color: theme('colors.white');
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    span {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        &::after {
            content: '';
            display: block;
            margin-top: 5px;
            width: 12px;
            height: 8px;
            background-color: #fff;
            clip-path: polygon(0 0, 100% 0, 50% 100%);
            -webkit-clip-path: polygon(0 0, 100% 0, 50% 100%);
        }
    }
}
</style>
