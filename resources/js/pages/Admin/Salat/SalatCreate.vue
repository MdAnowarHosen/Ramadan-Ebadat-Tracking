<script setup lang="ts">

import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

import { Button } from "@/components/ui/button"
import { Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'স্বলাত যুক্ত করুন',
        href: '/admin/salat/create',
    },
];

defineProps<{
    data?: object;
}>();

</script>

<template>
    <Head title="স্বলাত যুক্ত করুন" />
    <AppLayout :breadcrumbs="breadcrumbs">

  </AppLayout>
</template>
