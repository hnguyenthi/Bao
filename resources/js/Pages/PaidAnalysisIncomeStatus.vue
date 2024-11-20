<script setup>
import { ref, watch, onMounted } from 'vue';
import TableIncome from '@/Components/paidAnalysis/TablePaidIncome.vue';
import TableTotal from '@/Components/paidAnalysis/TableTotal.vue';

import TabControlPageVue from '@/Components/paidAnalysis/TabControlPage.vue';
import TilePage from '@/Components/TitlePage.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import DatePicker from '@/Components/DatePicker.vue';
import { formatPrice } from '@utils';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { categoryIncomeExpense } from '@utils/constraints.js';
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
const title = ref('グリーンパーク川口');
const mockDataIncomeAndExpenses = ref({
    income: 370000,
    expenses: 35000,
});
const mockDataTableIncome = ref({
    headers: [
        {
            title: '部屋番号',
            width: 97,
        },
        {
            title: '収支項目',
            width: 206,
        },
        {
            title: '収支項目',
            width: 131,
        },
        {
            title: '収支項目',
        },
    ],
    data: [
        {
            roomID: '102',
            income: [
                {
                    parentId: 1,
                    id: 1,
                    title: '家賃',
                },
                {
                    parentId: 1,
                    id: 2,
                    title: '共益費',
                },
                {
                    parentId: 2,
                    id: 1,
                    title: '駐車場2台目',
                },
            ],
            price: [48000, 3000, 3000],
        },
        {
            roomID: '103',
            income: [
                {
                    parentId: 1,
                    id: 1,
                    title: '家賃',
                },
                {
                    parentId: 1,
                    id: 2,
                    title: '共益費',
                },
                {
                    parentId: 2,
                    id: 1,
                    title: '駐車場2台目',
                },
            ],
            price: [48000, 3000, 3000],
        },
        {
            roomID: '201',
            income: [
                {
                    parentId: 1,
                    id: 1,
                    title: '家賃',
                },
                {
                    parentId: 1,
                    id: 2,
                    title: '共益費',
                },
            ],
            price: [50000, 2000],
        },
        {
            roomID: '204',
            income: [
                {
                    parentId: 1,
                    id: 1,
                    title: '家賃',
                },
                {
                    parentId: 1,
                    id: 2,
                    title: '共益費',
                },
                {
                    parentId: 2,
                    id: 1,
                    title: '駐車場2台目',
                },
                {
                    parentId: 5,
                    id: 1,
                    title: 'その他',
                },
            ],
            price: [47000, 3000, 3000, 3000],
        },
    ],
});

const notes = ref([
    {
        title: '明細',
        contents: [
            '※金額は税込み表示です',
            '※金額及び備考をタップすることで修正が可能です',
        ],
    },
    {
        title: '合計',
        contents: ['※金額は税込み表示です'],
    },
]);
const openModal = ref(false);
const closeModal = () => {
    openModal.value = false;
};
const handleYes = () => {
    console.log('yes');
};
const handleEdit = () => {
    openModal.value = true;
};
const makeData = () => {
    let data = mockDataTableIncome.value.data.reduce((preItem, nextItem) => {
        nextItem.income.map((item, index) => {
            let indexItem = preItem.findIndex(
                (preItem) =>
                    item.parentId === preItem.parentId &&
                    item.id === preItem.id,
            );
            if (indexItem < 0) {
                preItem.push({
                    parentId: item.parentId,
                    id: item.id,
                    title: item.title,
                    price: nextItem.price[index],
                });
            } else {
                preItem[indexItem].price += nextItem.price[index];
            }
        });
        return [...preItem];
    }, []);
    data = data.map((item) => {
        let title =
            categoryIncomeExpense.find(
                (category) => category.id === item.parentId,
            )?.title ?? '';
        return { title: item.title, parentTitle: title, price: item.price };
    });
    const headers = [
        {
            title: '収支科目',
            width: 96,
        },
        {
            title: '収支項目',
            width: 206,
        },
        {
            title: '金額',
            width: 131,
        },
    ];
    makeDataTotal.value.headers = headers;
    makeDataTotal.value.data = data;
};
const makeDataTotal = ref({});
onMounted(makeData);
</script>
<template>
    <div class="bg-light">
        <Breadcrumb :breadcrumbs="breadcrumbs"></Breadcrumb>
        <TilePage title="物件管理・分析" />
        <div class="container mx-auto rounded-t-md bg-white mb-[28px]">
            <TabControlPageVue />
            <div class="mx-[50px]">
                <div
                    class="flex justify-center border-b-[1px] border-solid border-grey"
                >
                    <div class="max-w-[242px]">
                        <DatePicker v-model="month" type="month-picker" />
                    </div>
                </div>

                <div class="pb-[28px]">
                    <p class="font-normalS mb-[5px] text-center text-[20px]">
                        {{ title }}
                    </p>
                    <p class="my-[16px] text-center text-h5 font-medium">
                        収入金額計<span
                            class="text-[36px] font-medium text-primary"
                            >{{
                                formatPrice(mockDataIncomeAndExpenses.income)
                            }}</span
                        >
                    </p>
                    <p class="my-[16px] text-center text-h6 font-medium">
                        収支金額計{{
                            formatPrice(mockDataIncomeAndExpenses.expenses)
                        }}
                    </p>
                </div>
                <div>
                    <div
                        class="note mb-[13px] flex items-center justify-between"
                    >
                        <div class="flex items-center justify-start">
                            <p class="text-[22px]">{{ notes[0].title }}</p>
                            <p
                                class="ml-[20px] text-[14px]"
                                v-for="(note, index) in notes[0].contents"
                                :key="'note-' + index"
                            >
                                {{ note }}
                            </p>
                        </div>
                        <SecondaryButton @click="handleEdit"
                            >追加</SecondaryButton
                        >
                    </div>
                    <TableIncome
                        :handleEdit="handleEdit"
                        :headers="mockDataTableIncome.headers"
                        :data="mockDataTableIncome.data"
                    />
                    <div class="pt-[10px] text-right">
                        <SecondaryButton @click="handleEdit"
                            >追加</SecondaryButton
                        >
                    </div>
                </div>
                <div class="mt-[53px]">
                    <div
                        class="note mb-[13px] flex items-center justify-between"
                    >
                        <div class="flex items-center justify-start">
                            <p class="text-[22px]">{{ notes[1].title }}</p>
                            <p
                                class="ml-[20px] text-[14px]"
                                v-for="(note, index) in notes[1].contents"
                                :key="'note-' + index"
                            >
                                {{ note }}
                            </p>
                        </div>
                    </div>
                    <TableTotal
                        
                        :headers="makeDataTotal.headers"
                        :data="makeDataTotal.data"
                    />
                </div>
            </div>
        </div>
        <Modal v-model="openModal" @yes="handleYes">
            <p class="text-center">
                外部のサイトに移動しますがよろしいですか？
            </p>
        </Modal>
    </div>
</template>
