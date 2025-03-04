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

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Salat',
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
    <TableCaption>A list of your recent invoices.</TableCaption>
    <TableHeader>
      <TableRow>
        <TableHead class="w-[100px]">
          Invoice
        </TableHead>
        <TableHead>Status</TableHead>
        <TableHead>Method</TableHead>
        <TableHead class="text-right">
          Amount
        </TableHead>
      </TableRow>
    </TableHeader>
    <TableBody>
      <TableRow>
        <TableCell class="font-medium">
          INV001
        </TableCell>
        <TableCell>Paid</TableCell>
        <TableCell>Credit Card</TableCell>
        <TableCell class="text-right">
          $250.00
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
  </AppLayout>
</template>