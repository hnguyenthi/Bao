<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';

</script>

<template>
    <div class="w-full md:w-[500px] px-[20px] md:px-[40px]">
        <div class="title m-auto bg-secondary-100 rounded w-full">
            <p class="text-[28px] text-white font-bold text-center leading-[50px] md:w-[460px]">今月のおすすめ</p>
        </div>
        <div class="w-full">
            <img src="@assets/images/top/recommend.png" alt="recommend">
        </div>
        <div>
            <PrimaryButton classes="!h-[50px]" type="primary" radius="default">
                <div class="text-white text-[24px] font-bold">
                    詳しく見る
                </div>
            </PrimaryButton>
        </div>
    </div>
</template>
