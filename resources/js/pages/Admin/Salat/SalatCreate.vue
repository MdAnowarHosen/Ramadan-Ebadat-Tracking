<script setup lang="ts">

import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';


import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ref } from 'vue';
import InputError from '@/components/InputError.vue';
import { LoaderCircle } from 'lucide-vue-next';
import CardContent from '@/components/custom/CardContent.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'স্বলাত যুক্ত করুন',
        href: '/admin/salat/create',
    },
];

defineProps<{
    data?: object;
}>();

const form = useForm({
    name: '',
    rakat: 0,
});

function submit(){

}

</script>

<template>
    <Head title="স্বলাত যুক্ত করুন" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <CardContent title="স্বলাত সংযুক্ত করুন" header="স্বলাত সংযুক্ত করতে নিম্নের তথ্য গুলো প্রবেশ করুন" class="mt-5">
            <form @submit.prevent="submit" >
                <div class="grid grid-cols-1 gap-4 mx-5 mt-5 md:grid-cols-2">
                    <div class="">
                        <Label for="name">স্বলাতের ওয়াক্তের নাম</Label>
                    <Input
                            id="name"
                            type="text"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="name"
                            v-model="form.name"
                            placeholder="স্বলাতের ওয়াক্তের নাম"
                        />
                        <InputError :message="form.errors.name" />
                    </div>

                    <div class="">
                        <Label for="name">ফরজ রাকাত সংখ্যা</Label>
                    <Input
                            id="rakat"
                            type="number"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="rakat"
                            v-model.number="form.rakat"
                            placeholder="স্বলাতের ওয়াক্তের নাম"
                        />
                        <InputError :message="form.errors.rakat" />
                    </div>


                </div>

                <Button type="submit" variant="outline" class="mx-5 mt-4" :tabindex="4" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="w-4 h-4 animate-spin" />
                        সংরক্ষন করুন
                    </Button>
            </form>
        </CardContent>
  </AppLayout>
</template>
