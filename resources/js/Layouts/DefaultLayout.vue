<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import HeaderDefault from '@/Layouts/components/HeaderDefault.vue';
import FooterDefault from '@/Layouts/components/FooterDefault.vue';

import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <HeaderDefault />
        <main class="pt-[100px]">
            <slot />
        </main>
        <FooterDefault />
    </div>
</template>
