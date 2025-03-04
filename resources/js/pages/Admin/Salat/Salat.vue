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
import { Button } from "@/components/ui/button"
import { Link } from '@inertiajs/vue3';

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
    <Head title="স্বলাত সমূহ" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <Link class="mt-2"  :href="route('admin.salat.create')" ><Button variant="outline">স্বলাত যুক্ত করুন</Button></Link>
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
      <TableRow v-for="row in data" :key="row.id" >
        <TableCell class="font-medium">
          {{ row.name }}
        </TableCell>
        <TableCell>{{ row.faraj_rakat }}</TableCell>
        <TableCell>
            <DropdownMenu>
                <DropdownMenuTrigger><Button variant="outline">নির্বাচন</Button></DropdownMenuTrigger>
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
