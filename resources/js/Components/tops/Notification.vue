<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const mockData = ref([
    {
        date: '2024/07/31',
        type: 'event',
        title: '【会員限定・参加無料】渡邊浩滋税理士によるオンラインセミナー開催のお知らせ（2024年9月1日）',
    },
    {
        date: '2024/07/31',
        type: 'all',
        title: '夏季休暇のお知らせ',
    },
    {
        date: '2024/07/31',
        type: 'all',
        title: '【セミナー動画配信開始】『法人化！勘違いと失敗事例から学ぶ判断基準』（2024年6月16日開催）',
    },
]);
</script>

<template>
    <div class="top__notification">
        <div class="mb-[18px] flex justify-between px-[20px] md:px-0">
            <h2 class="text-h2 font-medium text-dark">お知らせ</h2>
            <Link href="#" class="common-link">
                <div>お知らせ一覧</div>
            </Link>
        </div>
        <div class="top__notification__list">
            <div v-for="(item, index) in mockData" :key="index">
                <Link
                    href="`news?id=197&amp;ac=`"
                    class="notification__item border-b-[1px] border-grey px-[20px] pb-[23px] pt-[21px] hover:cursor-pointer hover:opacity-70"
                    :class="{ 'border-t-[1px]': index === 0 }"
                >
                    <div class="md:flex md:overflow-hidden">
                        <div class="flex">
                            <p>{{ item.date }}</p>
                            <div
                                class="ml-[14px] min-w-[120px] rounded-sm text-center text-white"
                                :class="`${item.type === 'event' ? 'bg-secondary-100' : 'bg-primary'}`"
                            >
                                {{
                                    item.type === 'event' ? 'イベント' : '全体'
                                }}
                            </div>
                        </div>
                        <div class="md:ml-[14px] md:truncate">{{ item.title }}</div>
                    </div>
                </Link>
            </div>
        </div>
    </div>
</template>
