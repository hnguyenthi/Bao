<script setup>
import { Link } from '@inertiajs/vue3';
import { reactive } from 'vue';
import Hamburger from '@/Layouts/components/Hamburger.vue';
import NavbarHeader from '@/Layouts/components/NavbarHeader.vue';
</script>

<template>
    <header class="fixed z-[49] w-full">
        <Hamburger />
        <div>
            <NavbarHeader />
        </div>
    </header>
</template>
