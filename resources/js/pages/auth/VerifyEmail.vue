<script setup lang="ts">
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
    status?: string;
}>();

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};
</script>

<template>
    <AuthLayout title="ইমেল যাচাই করুন" description="আমরা এইমাত্র আপনাকে ইমেল করেছি সেই লিঙ্কটিতে ক্লিক করে অনুগ্রহ করে আপনার ইমেল ঠিকানা যাচাই করুন৷">
        <Head title="ইমেল যাচাইকরণ" />

        <div v-if="status === 'verification-link-sent'" class="mb-4 text-sm font-medium text-center text-green-600">
            নিবন্ধনের সময় আপনার দেওয়া ইমেল ঠিকানায় একটি নতুন যাচাইকরণ লিঙ্ক পাঠানো হয়েছে।
        </div>

        <form @submit.prevent="submit" class="space-y-6 text-center">
            <Button :disabled="form.processing" variant="secondary">
                <LoaderCircle v-if="form.processing" class="w-4 h-4 animate-spin" />
                যাচাইকরণ ইমেল পুনরায় পাঠান
            </Button>

            <TextLink :href="route('logout')" method="post" as="button" class="block mx-auto text-sm"> লগ আউট </TextLink>
        </form>
    </AuthLayout>
</template>
