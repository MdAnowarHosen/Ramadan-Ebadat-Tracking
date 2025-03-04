<script setup lang="ts">
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ChevronDown, FilePenLine, Trash } from 'lucide-vue-next';
import Swal from 'sweetalert2';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'স্বলাত',
        href: '/admin/salat',
    },
];

defineProps<{
    data?: object;
}>();

const form = useForm({});

function remove(id) {
    Swal.fire({
        icon: 'question',
        title: 'আপনি কি নিশ্চিন্ত?',
        text: 'আপনি কি স্বলাত টি মুছে ফেলতে চাচ্ছেন?',
        showCancelButton: true,
        confirmButtonText: 'হ্যা',
    }).then((result) => {

        if (result.isConfirmed) {
            form.delete(route('admin.salat.destroy', { salat: id }), {
                onSuccess: function () {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'স্বলাত মুছে ফেলা হয়েছে',
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
                    });
                },
            });
        }
    });
}
</script>

<template>
    <Head title="স্বলাত সমূহ" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <Link class="mt-2" :href="route('admin.salat.create')"><Button variant="outline">স্বলাত যুক্ত করুন</Button></Link>
        <Table>
            <TableCaption>সকল স্বলাত।</TableCaption>
            <TableHeader>
                <TableRow>
                    <TableHead class="w-[100px]"> নাম </TableHead>
                    <TableHead>ফরজ রাকাত</TableHead>
                    <TableHead>একশন</TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="row in data" :key="row.id">
                    <TableCell class="font-medium">
                        {{ row.name }}
                    </TableCell>
                    <TableCell>{{ row.faraj_rakat }}</TableCell>
                    <TableCell>
                        <DropdownMenu>
                            <DropdownMenuTrigger
                                ><Button variant="outline"><ChevronDown /></Button
                            ></DropdownMenuTrigger>
                            <DropdownMenuContent>
                                <DropdownMenuLabel>একশন সমূহ</DropdownMenuLabel>
                                <DropdownMenuSeparator />
                                <DropdownMenuItem><FilePenLine /> সম্পাদন করুন</DropdownMenuItem>
                                <DropdownMenuItem @click="remove(row.id)"><Trash /> মুছে ফেলুন</DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </AppLayout>
</template>
