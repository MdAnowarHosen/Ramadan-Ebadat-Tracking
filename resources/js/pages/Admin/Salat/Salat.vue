<script setup lang="ts">
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'
import { FilePenLine, Trash  } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'স্বলাত',
        href: '/admin/salat',
    },
];

defineProps<{
    data?: object;
}>();

</script>

<template>
    <Head title="Salat" />
    <AppLayout :breadcrumbs="breadcrumbs">
  <Table>
    <TableCaption>সকল স্বলাত।</TableCaption>
    <TableHeader>
      <TableRow>
        <TableHead class="w-[100px]">
          নাম
        </TableHead>
        <TableHead>ফরজ রাকাত</TableHead>
        <TableHead>একশন</TableHead>

      </TableRow>
    </TableHeader>
    <TableBody>
      <TableRow>
        <TableCell class="font-medium">
          INV001
        </TableCell>
        <TableCell>Paid</TableCell>
        <TableCell>
            <DropdownMenu>
                <DropdownMenuTrigger class="primary-admin-button">নির্বাচন</DropdownMenuTrigger>
                <DropdownMenuContent>
                <DropdownMenuLabel>একশন সমূহ</DropdownMenuLabel>
                <DropdownMenuSeparator />
                <DropdownMenuItem><FilePenLine /> সম্পাদনা করুন</DropdownMenuItem>
                <DropdownMenuItem><Trash /> মুছে ফেলুন</DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </TableCell>

      </TableRow>
    </TableBody>
  </Table>
  </AppLayout>
</template>
