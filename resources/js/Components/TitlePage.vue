<script setup>
const props = defineProps({
    title: {
        type: String,
        default: ""
    }
})
</script>
<template>
<div class="container mx-auto pt-[35px] pb-[21px]">
    <h2 class="text-h2 font-medium">{{title}}</h2>

</div>
</template>