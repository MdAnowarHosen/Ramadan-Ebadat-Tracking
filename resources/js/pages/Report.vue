<template>
    <!-- salat report -->
    <div>
        <h1 class="px-4 mb-4 ml-3 text-lg font-medium ">স্বলাত রিপোর্ট</h1>
        <div class="grid gap-4 px-4 grid-cols md:grid-cols-3 ">
            <DashCard header="ফরজ স্বলাত" content="আদায় হয়েছে" :description="`${props.data?.salat?.today?.total_wakto || 0} ওয়াক্ত`" footer="আজ" />
            <DashCard header="ফরজ রাকাত" content="আদায় হয়েছে" :description="`${props.data?.salat?.today?.total_faraj_rakat || 0} রাকাত`" footer="আজ" />
            <DashCard header="সুন্নাত রাকাত" content="আদায় হয়েছে" :description="`${props.data?.salat?.today?.total_sunnah_rakat || 0} রাকাত`" footer="আজ" />

            <DashCard header="ফরজ স্বলাত" content="আদায় হয়েছে" :description="`${props.data?.salat?.last_week?.total_wakto || 0} ওয়াক্ত`" footer="এই সপ্তাহে" />
            <DashCard header="ফরজ রাকাত" content="আদায় হয়েছে" :description="`${props.data?.salat?.last_week?.total_faraj_rakat || 0} রাকাত`" footer="এই সপ্তাহে" />
            <DashCard header="সুন্নাত রাকাত" content="আদায় হয়েছে" :description="`${props.data?.salat?.last_week?.total_sunnah_rakat || 0} রাকাত`" footer="এই সপ্তাহে" />
        </div>
    </div>
        <!-- quran report -->
    <div class="mt-10">
        <h1 class="px-4 mb-4 ml-3 text-lg font-medium ">কুরআন রিপোর্ট</h1>
        <div class="grid gap-4 px-4 grid-cols md:grid-cols-3 ">
            <DashCard header="কুরআন" content="পড়া হয়েছে" :description="`${props.data?.quran_track?.today?.total_ayat || 0} আয়াত`" footer="আজ" />
            <DashCard header="কুরআন" content="পড়া হয়েছে" :description="`${props.data?.quran_track?.today?.total_page || 0} পাতা`" footer="আজ" />
            <DashCard header="কুরআন" content="পড়া হয়েছে" :description="`${props.data?.quran_track?.today?.total_para || 0} পারা`" footer="আজ" />

            <DashCard header="কুরআন" content="পড়া হয়েছে" :description="`${props.data?.quran_track?.last_week?.total_ayat || 0} আয়াত`" footer="এই সপ্তাহে" />
            <DashCard header="কুরআন" content="পড়া হয়েছে" :description="`${props.data?.quran_track?.last_week?.total_page || 0} পাতা`" footer="এই সপ্তাহে" />
            <DashCard header="কুরআন" content="পড়া হয়েছে" :description="`${props.data?.quran_track?.last_week?.total_para || 0} পারা`" footer="এই সপ্তাহে" />
        </div>
    </div>
     <!-- task report -->
    <div class="mt-10">
        <h1 class="px-4 mb-4 ml-3 text-lg font-medium ">দৈনিক চেকলিস্ট রিপোর্ট</h1>
        <div class="grid gap-4 px-4 grid-cols md:grid-cols-3 ">
            <DashCard header="দৈনিক চেকলিস্ট" content="সম্পূর্ণ হয়েছে" :description="`${props.data?.task?.today?.total_tasks || 0} টি`" footer="আজ" />
            <DashCard header="দৈনিক চেকলিস্ট" content="সম্পূর্ণ হয়েছে" :description="`${props.data?.task?.last_week?.total_tasks || 0} টি`" footer="এই সপ্তাহে" />
        </div>
    </div>
</template>

<script lang="ts" setup>
import DashCard from '../components/custom/DashCard.vue';

// define props
const props = defineProps({
    data: Object,
});
</script>
