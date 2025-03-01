<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    name: '',
    email: '',
    age: '',
    gender: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthBase title="নতুন একাউন্ট তৈরি করুন" description="একাউন্ট তৈরি করতে নিম্নের তথ্য গুলো প্রবেশ করুন">
        <Head title="একাউন্ট তৈরি" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="name">নাম</Label>
                    <Input id="name" type="text" required autofocus :tabindex="1" autocomplete="name" v-model="form.name" placeholder="সম্পূর্ণ নাম" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">ইমেইল</Label>
                    <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form.email" placeholder="email@example.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="gender">আমি একজন</Label>
                    <select
                        required
                        :tabindex="2"
                        autocomplete="gender"
                        v-model="form.gender"
                        id="gender"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-gray-900 focus:ring-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-500 dark:focus:ring-gray-500"
                    >
                        <option value="male">পুরুষ</option>
                        <option value="female">মহিলা</option>
                    </select>
                    <InputError :message="form.errors.gender" />
                </div>

                <div class="grid gap-2">
                    <Label for="age">বয়স</Label>
                    <Input id="age" type="number" required :tabindex="2" autocomplete="age" v-model="form.age" placeholder="আপনার বয়স" />
                    <InputError :message="form.errors.age" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">পাসওয়ার্ড</Label>
                    <Input
                        id="password"
                        type="password"
                        required
                        :tabindex="3"
                        autocomplete="new-password"
                        v-model="form.password"
                        placeholder="পাসওয়ার্ড"
                    />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirm password</Label>
                    <Input
                        id="password_confirmation"
                        type="password"
                        required
                        :tabindex="4"
                        autocomplete="new-password"
                        v-model="form.password_confirmation"
                        placeholder="নিশ্চিত পাসওয়ার্ড"
                    />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <Button type="submit" class="w-full mt-2" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="w-4 h-4 animate-spin" />
                    একাউন্ট তৈরি করুন
                </Button>
            </div>

            <div class="text-sm text-center text-muted-foreground">
            ইতিমধ্যে একাউন্ট আছে?
                <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">লগ ইন</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
