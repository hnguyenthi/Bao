<script setup>
import { ref } from 'vue';
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
const img = ref("")
</script>
<template>
    <div>
        <div class="contract-content grid grid-cols-8 gap-4">
            <div class="contract-info col-span-2">
                <div class="relative mr-7">
                    <div>
                        <img v-if="!img" src="@assets/images/common/noimage-icon.svg" alt="noimage-icon">
                        <img v-else :src="img" alt="">
                    </div>
                    <div class="w-[30px] h-[30px] rounded-full bg-white shadow-md hover:opacity-70 flex justify-center items-center cursor-pointer absolute -right-3 -bottom-3">
                        <img src="@assets/images/common/icon-img-upload.svg" alt="icon-img-upload">
                    </div>
                </div>
                <div>
                    <p class="text-[14px]">{{'グリーンパーク川口'}}</p>
                    <p class="text-[12px]">{{`在室数${5}／空室数${1}`}}</p>
                </div>
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <p>収入</p>
                        <p class="text-info-600 font-medium">￥242,000</p>
                    </div>
                    <div>
                        <p>支出</p>
                        <p></p>
                    </div>
                    <div>
                        <p>支出</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-span-3">actine</div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.contract-info {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    padding-right: 18px;
    flex: 0 0 280px;
    &::after {
        content: "";
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    margin-top: auto;
    margin-bottom: auto;
    width: 1px;
    height: 34px;
    background-color: #d5d5d5;
    }
}
</style>
