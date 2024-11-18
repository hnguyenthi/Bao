<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import iconPaidAnalysisDashboard from '@assets/images/common/icon-gnav-paidAnalysisDashboard.svg';
import iconReport from '@assets/images/common/icon-gnav-report.svg';

import iconPremium from '@assets/images/common/icon-gnav-premium.svg';

import iconMemberContent from '@assets/images/common/icon-gnav-member-content.svg';

import iconNews from '@assets/images/common/icon-gnav-news.svg';

const navbar = ref([
    {
        title: '物件管理・分析',
        link: 'paidAnalysisDashboard',
        icon: iconPaidAnalysisDashboard,
    },
    {
        title: '収支報告書管理',
        // link: 'report?tab_item=on',
        link: 'home',

        icon: iconReport,
    },
    {
        title: '提携サービス',
        link: 'premium',
        icon: iconPremium,
        // link: 'profile.edit',
    },
    {
        title: 'セミナー動画',
        icon: iconMemberContent,
    },
    {
        title: 'お知らせ',
        link: 'news-archive',
        icon: iconNews,
    },
]);
</script>

<template>
    <nav class="h-[66px] bg-white shadow-lg">
        <div class="container mx-auto h-full !px-0">
            <div class="grid h-full grid-flow-col justify-stretch">
                <div
                    class="item-center relative flex hidden h-full w-[120px] justify-items-center xl:block xl:w-[222px]"
                >
                    <div
                        class="header-logo - flex h-[54px] w-[120px] items-center justify-center rounded-t-[5px] bg-white lg:absolute lg:bottom-0 xl:h-[92px] xl:w-[222px] 2xl:-top-7 2xl:w-[222px]"
                    >
                        <Link
                            href="top"
                            class="h-full content-center items-center justify-center"
                        >
                            <img
                                src="@assets/images/common/logo.png"
                                alt="logo"
                                class="h-[34px] w-[100px] xl:h-[60px] xl:w-[180px]"
                            />
                        </Link>
                    </div>
                </div>

                <Link
                    class="md:navbar-item relative flex font-bold text-primary hover:bg-secondary-200"
                    :class="{
                        'bg-secondary-300 md:border-b-4 md:border-secondary-100': true,
                    }"
                    v-for="item in navbar"
                    :key="item.title"
                    :href="item.link ?? '#'"
                >
                    <div
                        v-if="item.link"
                        class="lg:align-center my-auto w-full items-center justify-center justify-self-auto md:px-2 lg:flex xl:px-[1.66rem]"
                    >
                        <div class="mr-0 flex justify-center lg:pr-2">
                            <img
                                :src="item.icon"
                                alt=""
                                class="lg:[w-22px] h-[20px] w-[20px] lg:h-[22px]"
                            />
                            <!-- <img :src="`resources/assets/images/common/logo.png`" alt=""  class="ssss w-[20px] h-[20px] lg:[w-22px] lg:h-[22px]"/> -->
                        </div>
                        <div class="text-center text-[10px] lg:text-[16px]">
                            {{ item.title }}
                        </div>
                    </div>
                    <div
                        v-else
                        class="lg:align-center my-auto w-full items-center justify-center justify-self-auto md:px-2 lg:flex xl:px-[1.68rem]"
                    >
                        <div class="mr-0 flex justify-center lg:pr-2">
                            <img
                                :src="item.icon"
                                alt=""
                                class="lg:[w-22px] h-[20px] w-[20px] lg:h-[22px]"
                            />
                        </div>
                        <div class="text-center text-[10px] lg:text-[16px]">
                            {{ item.title }}
                        </div>
                        <div
                            class="lg:[w-22px] hidden h-[20px] w-[20px] pl-2 lg:block lg:h-[22px]"
                        >
                            <img
                                class="lg:[w-22px] h-[20px] w-[20px] lg:h-[22px]"
                                src="@assets/images/common/icon-newtab-gold.svg"
                                alt=""
                            />
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </nav>
</template>
<style lang="scss" scoped>
.navbar-item::after {
    content: '';
    position: absolute;
    top: 16px;
    right: 0;
    bottom: 16px;
    width: 1px;
    background-color: #d5d5d5;
}
</style>
