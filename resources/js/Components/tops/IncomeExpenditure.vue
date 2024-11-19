<script setup>
import Dropdown from '@/Components/paidAnalysis/Dropdown.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
const mockData = ref({
    income: '468,127',
    expenditure: '184,866',
    profit: '283,281',
});
const options = ref([
    {
        value: 1,
        title: 'すべての物件',
    },
    {
        value: 2,
        title: 'グリーンパーク川口',
    },
    {
        value: 3,
        title: 'パークハウス赤坂',
    },
    {
        value: 4,
        title: 'リバーサイド赤羽',
    },
]);
const value = ref(1);
</script>

<template>
    <div class="top__income-expenditure flex flex-col">
        <div class="mb-[18px] md:flex md:justify-between">
            <div></div>
            <p
                class="text-center text-h5 font-medium font-semibold text-primary md:text-left md:text-h4"
            >
                最新の収支情報（2019/03）
            </p>
            <Link
                href="paidAnalysisDashboard"
                class="common-link flex justify-end"
            >
                <div class="text-[10px] md:text-h6">詳細を見る</div>
            </Link>
        </div>
        <div
            class="mb-[25px] mt-[20px] flex justify-center md:mb-[45px] md:mt-[30px]"
        >
            <Dropdown v-model="value" class="w-[180px]" :options="options">
            </Dropdown>
        </div>
        <div class="top__income-expenditure">
            <div class="flex content-center justify-around">
                <div>
                    <div class="text-center text-[18px]">収入</div>
                    <div class="text-[16px] text-primary md:text-[30px]">
                        ￥{{ mockData.income }}
                    </div>
                </div>
                <div class="">
                    <div class="text-center text-[18px]">支出</div>
                    <div class="text-[16px] text-red md:text-[30px]">
                        ￥{{ mockData.expenditure }}
                    </div>
                </div>

                <div>
                    <div class="text-center text-[18px]">利益</div>
                    <div class="text-[16px] text-primary md:text-[30px]">
                        ￥{{ mockData.profit }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.button-dropdown {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    height: 100%;
    padding-left: 12px;
    font-family: 'Noto Sans JP';
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 0.05em;
    text-align: left;
    color: #000;
    background-color: theme('colors.white');
    border: none;
    border-radius: 16px;
    box-shadow: 0 0 10px rgb(30, 66, 144, 0.25);
}
</style>
