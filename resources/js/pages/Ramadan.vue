<template>
    <Head title="হোম"></Head>

    <div class="max-w-4xl p-6 mx-auto rounded-lg shadow-lg bg-amber-50 dark:bg-gray-700">
        <!-- Header -->
        <div class="flex items-center justify-between pb-4 border-b">
            <div class="w-full px-4 py-2 mr-3 font-medium text-gray-600 rounded bg-amber-200 dark:bg-gray-800 dark:text-gray-400">{{ bengaliHijriDate }}</div>
            <div>
                <input
                    v-model="date"
                    @change="getDateData()"
                    type="date"
                    class="p-2 text-gray-700 rounded-lg border-amber-200 bg-amber-200 focus:ring focus:ring-amber-400 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:focus:ring-gray-400"
                    style="color-scheme: dark light"
                />
            </div>
        </div>
        <!-- Content Section -->
        <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
            <!-- Ayat of the Day -->
            <div class="p-4 rounded-lg bg-amber-100 dark:bg-gray-800">
                <h2 class="text-lg font-bold text-gray-600 dark:text-gray-400">দিনের আয়াত</h2>
                <p class="mt-2 text-right text-gray-600 dark:text-gray-400">
                    {{ props.todays_ayat.arabic_text }}<br />
                    ({{ props.todays_ayat.verse }})
                </p>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ props.todays_ayat.bangla_text }}</p>
            </div>

            <!-- Hadith of the Day -->
            <div class="p-4 rounded-lg bg-amber-100 dark:bg-gray-800">
                <h2 class="text-lg font-bold text-gray-600 dark:text-gray-400">দিনের হাদিস</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    যে ব্যক্তি ঈমানের সাথে পূর্বেকার গুনাহের জন্য রমাদানের রোজা রাখবে, তার পূর্বেকার সমস্ত গুনাহ মাফ করে দেয়া হবে।
                </p>
                <p class="text-gray-600 dark:text-gray-400">(সহিহ বুখারি, হাদিস: ৩৮)</p>
            </div>
        </div>

        <!-- Du'a Section -->
        <div class="p-4 mt-4 rounded-lg bg-amber-100 dark:bg-gray-800">
            <h2 class="text-lg font-bold text-center text-gray-600 dark:text-gray-400">দিনের দোয়া</h2>
            <p class="mt-2 text-center text-gray-600 dark:text-gray-400">
                رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ
            </p>
            <p class="text-center text-gray-600 dark:text-gray-400">(সূরা বাকারা: ২০১)</p>
        </div>

        <!-- Checklist & Tasks -->
        <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-3">
            <div class="p-4 rounded-lg bg-amber-100 dark:bg-gray-800">
                <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">সালাত ট্র্যাকার</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-amber-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-5">ওয়াক্ত</th>
                                <th scope="col" class="px-2 py-5">ফরজ</th>
                                <th scope="col" class="px-2 py-5">
                                    <TooltipProvider>
                                        <Tooltip>
                                        <TooltipTrigger>সুন্নত ও অন্যান্য</TooltipTrigger>
                                        <TooltipContent>
                                            <p>সুন্নত + নফল + তারাবীহ + বিতর</p>
                                        </TooltipContent>
                                        </Tooltip>
                                    </TooltipProvider>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                v-for="salat in salats"
                                :key="salat.id"
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">{{ salat.name }}</td>
                                <td class="py-8">
                                    <Checkbox   :model-value="salat.owned"   @click="salatAction(salat.id)"/>
                                </td>
                                <td class="py-8">
                                    <input
                                        v-model="salat.sunnah_rakat"
                                        @change="sunnahAction(salat.id, salat.sunnah_rakat)"
                                        type="number"
                                        min="0"
                                        class="h-5 text-amber-600  dark:text-gray-400 focus:ring-2 focus:ring-amber-500 dark:focus:ring-gray-800 bg-white border text-center border-gray-300 rounded w-14 dark:border-gray-600 dark:bg-gray-600"
                                    />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4 rounded-lg bg-amber-100 dark:bg-gray-800">
                <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">কুরআন ট্র্যাকার</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-amber-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-5">আয়াত</th>
                                <th scope="col" class="px-2 py-5">পৃষ্ঠা</th>
                                <th scope="col" class="px-2 py-5">পারা</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">
                                    <input
                                        v-model.lazy="quran.ayat"
                                        @change="quranAction()"
                                        type="number"
                                        min="0"
                                        class="h-8 text-center bg-white border border-gray-300 rounded w-18 text-amber-600 dark:text-gray-400 focus:ring-2 focus:ring-amber-500 dark:focus:ring-gray-800 dark:border-gray-600 dark:bg-gray-600"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        v-model.lazy="quran.page"
                                        @change="quranAction()"
                                        type="number"
                                        min="0"
                                        class="h-8 text-center bg-white border border-gray-300 rounded w-18 text-amber-600 dark:text-gray-400 focus:ring-2 focus:ring-amber-500 dark:focus:ring-gray-800 dark:border-gray-600 dark:bg-gray-600"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        v-model.lazy="quran.para"
                                        @change="quranAction()"
                                        type="number"
                                        min="0"
                                        class="h-8 text-center bg-white border border-gray-300 rounded w-18 text-amber-600 dark:text-gray-400 focus:ring-2 focus:ring-amber-500 dark:focus:ring-gray-800 dark:border-gray-600 dark:bg-gray-600"
                                    />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="relative overflow-x-auto shadow-md mt-14 sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-amber-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-lg font-bold">দিনের কাজ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-2 font-medium bg-amber-100 dark:bg-gray-900" style="line-height: 20px">
                                    <p class="">সাফল্য অর্জনের জন্যে সূরা আল-মূমিনূনের প্রথম ১৫ টি আয়াত অর্থ সহ পড়ুন।</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-amber-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-lg font-bold">দিনের কাজ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-2 font-medium bg-amber-100 dark:bg-gray-900" style="line-height: 20px">
                                    <p class="">সাফল্য অর্জনের জন্যে সূরা আল-মূমিনূনের প্রথম ১৫ টি আয়াত অর্থ সহ পড়ুন।</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4 rounded-lg bg-amber-100 dark:bg-gray-800">
                <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">দৈনিক চেকলিস্ট</h2>
                <div class="">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                            <thead class="text-xs text-center text-gray-700 uppercase bg-amber-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-2 py-3">সম্পন্ন</th>
                                    <th scope="col" class="px-2 py-3">বিষয়</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr
                                    v-for="task in tasks"
                                    :key="task.id"
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <Checkbox   :model-value="task.owned"  @click="doAction(task.id)"/>
                                    </td>
                                    <td class="py-2 text-sm">
                                        <span>{{ task.name }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
// Give page title name
import { Head, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { ref } from 'vue';
import moment from 'moment-hijri';
import Checkbox from '@/components/ui/checkbox/Checkbox.vue';
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger
} from '@/components/ui/tooltip'

const props = defineProps({
    date: String,
    hijri_date_adjust: String,
    salats: Object,
    quran_data: Object,
    tasks: Object,
    todays_ayat: Object,
});

const date = ref(props.date);
const hijri_date_adjust = ref(props.hijri_date_adjust);
const quran = ref(props.quran_data);

function getDateData() {
    router.get(
        '/',
        { date: date.value },
        {
            preserveScroll: true,
            onError: (errors) => {
                console.error('Error updating task:', errors);
                showError(errors);
            },
        },
    );
}

function doAction(id: number) {
    router.post(
        `/track/task/update/${id}`,
        { date: date.value },
        {
            preserveScroll: true,
            // onSuccess: () => {
            //     console.log('Task updated successfully!');
            //     // Perform any success actions, such as showing a success message
            // },
            onError: (errors) => {
                console.error('Error updating task:', errors);
                showError(errors);
            },
        },
    );
}

function salatAction(id: number) {
    router.post(
        `/track/salat/update/${id}`,
        { date: date.value },
        {
            preserveScroll: true,
            // onSuccess: () => {
            //     console.log('Task updated successfully!');
            //     // Perform any success actions, such as showing a success message
            // },
            onError: (errors) => {
                console.error('Error updating task:', errors);
                showError(errors);
                // refetch salat data
            },
        },
    );
}

function sunnahAction(id: number, sunnah_rakat: number) {
    // alert(sunnah_rakat);
    router.post(
        `/track/salat/sunnah_rakat/update/${id}`,
        { date: date.value, sunnah_rakat: sunnah_rakat },
        {
            preserveScroll: true,
            // onSuccess: () => {
            //     console.log('Task updated successfully!');
            //     // Perform any success actions, such as showing a success message
            // },
            onError: (errors) => {
                console.error('Error updating task:', errors);
                showError(errors);
            },
        },
    );
}

function quranAction() {
    router.post(
        '/track/quran/update',
        { ayat: quran.value.ayat, page: quran.value.page, para: quran.value.para, date: date.value, },
        {
            preserveScroll: true,
            // onSuccess: () => {
            //     console.log('Task updated successfully!');
            //     // Perform any success actions, such as showing a success message
            // },
            onError: (errors) => {
                console.error('Error updating task:', errors);
                showError(errors);
            },
        },
    );
}

function showError(errors) {
    Swal.fire({
        title: 'Error!',
        text: errors ? (Array.isArray(errors) ? errors[0] : Object.values(errors).join(', ')) : 'An error occurred',
        icon: 'error',
    });
}


// Date Calender
// =========================================================================

// Set the locale to Bengali (bn)
moment.locale('en');

// Convert numbers to Bengali
const convertToBengaliNumber = (num) => num.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯"[d]);

// Define Bengali month names mapping
const bengaliMonths = {
  "Muharram": "মুহররম",
  "Safar": "সফর",
  "Rabi' al-Awwal": "রবিউল আউয়াল",
  "Rabi' al-Thani": "রবিউস সানি",
  "Jumada al-Ula": "জমাদিউল আউয়াল",
  "Jumada al-Alkhirah": "জমাদিউস সানি",
  "Rajab": "রজব",
  "Sha’ban": "শা'বান",
  "Ramadhan": "রমজান",
  "Shawwal": "শাওয়াল",
  "Thul-Qi’dah": "জ্বিলকদ",
  "Thul-Hijjah": "জ্বিলহজ্জ"
};

// Convert Gregorian date to Hijri and format it
const dateA = moment(hijri_date_adjust.value, 'YYYY-MM-DD');
const formattedDate = dateA.format('iD,iMMMM,iYYYY');
// console.log('formated date is: ', formattedDate);
// console.log('Month Name is: ', bengaliMonths["Rabi' al-Thani"]);
// Extract day, month, and year from formatted Hijri date
let [day, month, year] = formattedDate.split(',');
// console.log('month is: ', month);
// Convert the Hijri date to Bengali
let bengaliHijriDate = `${convertToBengaliNumber(day)} ${bengaliMonths[month] || month} ${convertToBengaliNumber(year)}`;
// let bengaliHijriDate = `${convertToBengaliNumber(day)} ${bengaliMonths[month] || month}`;





</script>
