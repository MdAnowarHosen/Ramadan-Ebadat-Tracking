<script setup lang="ts">

import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

import { Link } from '@inertiajs/vue3';
import { useForm } from 'vee-validate'
import { toTypedSchema } from '@vee-validate/zod'
import * as z from 'zod'

import { Button } from '@/components/ui/button'
import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@/components/ui/form'
import { Input } from '@/components/ui/input'

const formSchema = toTypedSchema(z.object({
  username: z.string().min(2).max(50),
}))

const form = useForm({
  validationSchema: formSchema,
})

const onSubmit = form.handleSubmit((values) => {
  console.log('Form submitted!', values)
})

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
        <form @submit="onSubmit">
            <FormField v-slot="{ componentField }" name="username">
            <FormItem>
                <FormLabel>Username</FormLabel>
                <FormControl>
                <Input type="text" placeholder="shadcn" v-bind="componentField" />
                </FormControl>
                <FormDescription>
                This is your public display name.
                </FormDescription>
                <FormMessage />
            </FormItem>
            </FormField>
            <Button type="submit">
            Submit
            </Button>
        </form>
  </AppLayout>
</template>
