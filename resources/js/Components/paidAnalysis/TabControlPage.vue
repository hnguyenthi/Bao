<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import paidAnalysisPropertyStatus from '@assets/images/paidAnalysis/icon-paidAnalysisPropertyStatus.svg';
import paidAnalysisIncomeStatus from '@assets/images/paidAnalysis/icon-paidAnalysisIncomeStatus.svg';
import paidAnalysisExpenseStatus from '@assets/images/paidAnalysis/icon-paidAnalysisExpenseStatus.svg';
import paidAnalysisIncomeList from '@assets/images/paidAnalysis/icon-paidAnalysisIncomeList.svg';
import paidAnalysisBalanceList from '@assets/images/paidAnalysis/icon-paidAnalysisBalanceList.svg';
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
</script>
<template>
    <div class="container mx-auto h-[57px] rounded-t-md bg-white border-grey  border-b-[1px] border-solid">
        <div class="grid h-full grid-cols-6">
            <div
                v-for="(item, index) in tabs"
                :key="index + item.title"
                :class="{'link-active' : route().current(item.link)}"
                
            >
                <Link :href="item.link" class="h-full flex items-center justify-center">
                    <img
                        :src="item.icon"
                        alt=""
                        class="mr-[12px] h-[20px] w-[20px] object-none"
                    />
                    <p class="text-[16px] font-normal text-info-600">
                        {{ item.title }}
                    </p>
                </Link>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.active {
    border-bottom: 2px solid theme('colors.primary');
}
.link-active {
    border-bottom: 2px solid theme('colors.primary');
}
</style>
