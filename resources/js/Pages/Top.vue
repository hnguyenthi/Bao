<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Notification from '@/Components/tops/Notification.vue';
import IncomeExpenditure from '@/Components/tops/IncomeExpenditure.vue';
import Recommend from '@/Components/tops/Recommend.vue';
import SlideTopPage from '@/Components/tops/SlideTopPage.vue';
import Modal from '@/Components/Modal.vue';

import panasonic00 from '@assets/images/top/panasonic00.png';
import mamoroom00 from '@assets/images/top/mamoroom00.png';
import redeco00 from '@assets/images/top/redeco00.png';
import renxa01 from '@assets/images/top/renxa01.png';
const mockDataSlideServices = ref([
    {
        urlImage: panasonic00,
        category: '空室対策',
        subCategory: 'シャワー＆パウダーⅡ',
        title: 'お悩み解消！3点ユニット→　トイレ別に！',
    },
    {
        urlImage: mamoroom00,
        category: '空室対策',
        subCategory: 'まもROOM',
        title: '東京ガスの賃貸管理サポート',
    },
    {
        urlImage: redeco00,
        category: '空室対策',
        subCategory: 'Re;deco',
        title: '賃貸住宅向け超格安プチリノベーションで空室対策！',
    },
    {
        urlImage: renxa01,
        category: '不動産経営支援',
        subCategory: 'ファイナンシャルプランナー',
        title: 'ライフスタイルに合わせた保険商品のご案内をいたします。',
    },
]);

const mockDataSlideSeminar = ref([
    {
        urlImage: panasonic00,
        title: '～大家さん専門税理士が語る！～売り時を逃すな！所有物件を高く売る３つのコツ',
    },
    {
        urlImage: mamoroom00,
        title: '～大家さん専門税理士が語る！～売り時を逃すな！所有物件を高く売る３つのコツ',
    },
    {
        urlImage: redeco00,
        title: '～大家さん専門税理士が語る！～売り時を逃すな！所有物件を高く売る３つのコツ',
    },
    {
        urlImage: renxa01,
        title: '～大家さん専門税理士が語る！～売り時を逃すな！所有物件を高く売る３つのコツ',
    },
]);
const openModal = ref(false);

const handleYes = () => {
    console.log("yes")
}
const handleNo = () => {
    console.log("no")
}
</script>

<template>
    <div class="lg:px[100px] px-0 md:px-[20px] md:px-[40px] xl:px-[100px]">
        <div class="grid grid-cols-10">
            <div class="col-span-10 py-[40px] 2xl:col-span-6">
                <Notification />
            </div>
            <div class="col-span-10 2xl:col-span-4 2xl:py-[40px]">
                <IncomeExpenditure />
            </div>
        </div>
        <div class="xl:flex">
            <div class="mb-[40px] mt-[20px]">
                <Recommend />
            </div>
            <div class="w-full bg-light mt-0 md:mt-[20px]">
                <div class=""></div>
                <div class="pb-[54px] pt-[38px]">
                    <SlideTopPage
                        :data="mockDataSlideServices"
                        :url="{
                            description: '',
                            link: '',
                        }"
                        title="提携サービス"
                    />
                </div>
                <SlideTopPage
                    :lineTitle="4"
                    :data="mockDataSlideSeminar"
                    title="セミナー動画"
                />
            </div>
        </div>
    </div>
    <Modal :show="openModal" @yes="handleYes" >
        <p class="text-center">外部のサイトに移動しますがよろしいですか？</p>
    </Modal>
</template>
