<script setup>
import { ref } from 'vue';

import SlideCarousel from '@/Components/SlideCarousel.vue';
import SlideItem from '@/Components/tops/SlideItem.vue';
const props = defineProps({
    data: {
        type: Array,
        default: {},
    },
    lineTitle: {
        type: Number,
        default: 2,
    },
});
</script>
<template>
    <div class="px-[40px]">
        <SlideCarousel :data="data" title="提携サービス">
            <template v-slot="{ data }">
                <SlideItem :dataItem="data" :lineTitle="lineTitle" />
            </template>
        </SlideCarousel>
    </div>
</template>
