<script setup>
import { ref } from 'vue';
import { formatPrice } from '@utils';
import { Link } from '@inertiajs/vue3';

import paidAnalysisPropertyStatus from '@assets/images/paidAnalysis/icon-paidAnalysisPropertyStatus.svg';
import paidAnalysisIncomeStatus from '@assets/images/paidAnalysis/icon-paidAnalysisIncomeStatus.svg';
import paidAnalysisExpenseStatus from '@assets/images/paidAnalysis/icon-paidAnalysisExpenseStatus.svg';
import paidAnalysisIncomeList from '@assets/images/paidAnalysis/icon-paidAnalysisIncomeList.svg';
import paidAnalysisBalanceList from '@assets/images/paidAnalysis/icon-paidAnalysisBalanceList.svg';
import UploadImage from '@/Components/UploadImage.vue';
const tabs = ref([
    {
        title: '物件管理',
        icon: paidAnalysisPropertyStatus,
        link: 'paidAnalysisPropertyStatus',
    },
    {
        title: '収入明細',
        icon: paidAnalysisIncomeStatus,
        link: 'paidAnalysisIncomeStatus',
    },
    {
        title: '支出明細',
        icon: paidAnalysisExpenseStatus,
        link: 'paidAnalysisExpenseStatus',
    },
    {
        title: '入金一覧',
        icon: paidAnalysisIncomeList,
        link: 'paidAnnualPaymentInformation',
    },
    {
        title: '収支一覧',
        icon: paidAnalysisBalanceList,
        link: 'paidAnnualBalanceInformation',
    },
]);
const mockData = ref([
    {
        name: 'グリーンパーク川口',
        room: {
            empty: 1,
            lending: 5,
        },
        income: 242000,
        expenses: 57957,
        urlImage: '',
    },
    {
        name: 'パークハウス赤坂',
        room: {
            empty: 1,
            lending: 15,
        },
        income: 776000,
        expenses: 147539,
        urlImage: '',
    },
    {
        name: 'リバーサイド赤羽',
        room: {
            empty: 0,
            lending: 8,
        },
        income: 468127,
        expenses: 184866,
        urlImage: '',
    },
]);
const img = ref('');
</script>
<template>
    <div class="">
        <div
            class="contract-content grid grid-cols-8"
            v-for="(data, index) in mockData"
            :key="index"
        >
            <div class="contract-info col-span-2">
                <div class="mr-7">
                    <UploadImage v-model="data.urlImage" />
                </div>
                <div>
                    <p class="text-[14px]">{{ data.name }}</p>
                    <p class="text-[12px]">
                        {{
                            `在室数${data.room.lending}／空室数${data.room.empty}`
                        }}
                    </p>
                </div>
            </div>
            <div class="contract-balance col-span-3 px-[18px]">
                <div class="flex h-full items-center justify-between">
                    <div>
                        <p class="text-[12px] font-medium">収入</p>
                        <p class="text-h6 font-medium text-info-600">
                            {{ formatPrice(data.income) }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[12px] font-medium">支出</p>
                        <p class="text-h6 font-medium text-error-100">
                            {{ formatPrice(data.expenses) }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[12px] font-medium">利益</p>
                        <p class="text-h6 font-medium text-info-600">
                            {{ formatPrice(data.income - data.expenses) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-span-3 px-[18px]">
                <div class="flex h-full items-center justify-between">
                    <Link v-for="(tab, index) in tabs" :key="index + tab.title" :href="tab.link">
                        <div class="cursor-pointer hover:opacity-70">
                            <div class="flex justify-center">
                                <img :src="tab.icon" alt="" />
                            </div>
                            <p class="pt-[10px] text-[14px] text-info-600">
                                {{ tab.title }}
                            </p>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.contract-info {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    flex: 0 0 280px;
    &::after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
        width: 1px;
        height: 34px;
        background-color: theme('colors.grey');
    }
}
.contract-balance {
    position: relative;
    &::after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
        width: 1px;
        height: 34px;
        background-color: theme('colors.grey');
    }
}
.contract-content {
    border-top: solid 1px theme('colors.grey');
    padding: 8px 0px;
    &:last-child {
        border-bottom: solid 1px theme('colors.grey');
    }
}
</style>
