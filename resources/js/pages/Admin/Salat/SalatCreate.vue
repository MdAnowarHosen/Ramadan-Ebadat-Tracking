<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

import CardContent from '@/components/custom/CardContent.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { LoaderCircle } from 'lucide-vue-next';
import Swal from 'sweetalert2';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'স্বলাত যুক্ত করুন',
        href: '/admin/salat/create',
    },
];

const props = defineProps<{
    data?: object;
    last_position?: number;
}>();

const form = useForm({
    name: '',
    faraj_rakat: 0,
    position: props.last_position ? props.last_position + 1 : 1,
});

function submit() {
    form.post(route('admin.salat.store'), {
        onSuccess: function () {
            form.reset();
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'স্বলাত সংযুক্ত করা হয়েছে',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        },
        onError: function () {
            Swal.fire({
                icon: 'error',
                title: 'ওপস',
                text: 'কিছু ত্রুটি হয়েছে!',
                confirmButtonText: 'ঠিক আছে',
                footer: '<a href="#">ইনপুট গুলো ঠিক মতন প্রবেশ করিয়েছেন তো?</a>',
            });
        },
    });
}
</script>

<template>
    <Head title="স্বলাত যুক্ত করুন" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <CardContent title="স্বলাত সংযুক্ত করুন" header="স্বলাত সংযুক্ত করতে নিম্নের তথ্য গুলো প্রবেশ করুন" class="mt-5">
            <form @submit.prevent="submit">
                <div class="grid grid-cols-1 gap-4 mx-5 mt-5 md:grid-cols-2">
                    <div>
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

                    <div>
                        <Label for="name">ফরজ রাকাত সংখ্যা</Label>
                        <Input
                            id="faraj_rakat"
                            type="number"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="faraj_rakat"
                            v-model.number="form.faraj_rakat"
                            placeholder="স্বলাতের ওয়াক্তের নাম"
                        />
                        <InputError :message="form.errors.faraj_rakat" />
                    </div>
                    <div>
                        <Label for="name">অবস্থান</Label>
                        <Input
                            id="position"
                            type="number"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="position"
                            v-model.number="form.position"
                            placeholder="অবস্থান"
                        />
                        <InputError :message="form.errors.position" />
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
