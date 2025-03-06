<template>
    <Head title="হোম"></Head>

    <div class="mx-auto max-w-4xl rounded-lg bg-amber-50 p-6 shadow-lg dark:bg-gray-700">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-4">
            <div class="mr-3 w-full rounded bg-amber-200 px-4 py-2 font-medium text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                {{ bengaliHijriDate }}
            </div>
            <div>
                <input
                    v-model="date"
                    @change="getDateData()"
                    type="date"
                    class="rounded-lg border-amber-200 bg-amber-200 p-2 text-gray-700 focus:ring focus:ring-amber-400 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:focus:ring-gray-400"
                    style="color-scheme: dark light"
                />
            </div>
        </div>
        <!-- Content Section -->
        <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Ayat of the Day -->
            <div class="rounded-lg bg-amber-100 p-4 dark:bg-gray-800">
                <div>
                    <h2 class="text-lg font-bold text-gray-600 dark:text-gray-400">দিনের আয়াত</h2>
                    <p class="mt-2 text-right text-gray-600 dark:text-gray-400">
                        {{ props.todays_ayat.arabic_text }}<br />
                        ({{ props.todays_ayat.verse }})
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ props.todays_ayat.bangla_text }}</p>
                </div>
                <div class="mt-20">
                    <h2 class="text-lg font-bold text-gray-600 dark:text-gray-400">দিনের হাদিস</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        যে ব্যক্তি ঈমানের সাথে পূর্বেকার গুনাহের জন্য রমাদানের রোজা রাখবে, তার পূর্বেকার সমস্ত গুনাহ মাফ করে দেয়া হবে।
                    </p>
                    <p class="text-gray-600 dark:text-gray-400">(সহিহ বুখারি, হাদিস: ৩৮)</p>
                </div>
            </div>
            <!-- prying time -->
            <div>
                <div class="rounded-lg bg-amber-100 p-4 dark:bg-gray-800">
                    <!-- <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">স্বলাতের সময়</h2> -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                       <div class=" float-end ">
                        <div class="ml-5 flex">
                            <div class="mr-2">
                                {{ prying_time.place }}
                            </div>
                            <div class="mx-2">
                                <div class="">
                                        <TooltipProvider>
                                        <Tooltip>
                                        <TooltipTrigger><Locate class="w-4" /></TooltipTrigger>
                                        <TooltipContent>
                                            <p>লোকেশন সেট করুন</p>
                                        </TooltipContent>
                                        </Tooltip>
                                    </TooltipProvider>
                                    </div>
                            </div>
                        </div>
                       </div>
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                            <thead class="bg-amber-200 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <!-- <th scope="col" class="px-2 py-5">ওয়াক্ত</th> -->
                                    <th scope="col" colspan="2" class="px-2 py-5">
                                        <div>
                                            <span class="text-lg">সময়</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><Sunrise class="mr-4 w-5" /> <span class="mt-1">ফজর</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Fajr }}</td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><Sunrise class="mr-4 w-5" /> <span class="mt-1">সূর্যদয়</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Sunrise }}</td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><Sun class="mr-4 w-5" /> <span class="mt-1">যোহর</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Dhuhr }}</td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><SunDim class="mr-4 w-5" /> <span class="mt-1">আসর</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Asr }}</td>
                                </tr>
                                <!-- <tr class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <td class="py-3">
                                    <div class="flex justify-start ml-6">
                                        <Sunset  class="mr-4 w-5"/> <span class="mt-1">সূর্যাস্ত</span>
                                    </div>
                                </td>
                                <td class="py-3">{{ prying_time.Sunset }}</td>
                            </tr> -->
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><Sunset class="mr-4 w-5" /> <span class="mt-1">মাগরিব</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Maghrib }}</td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><Moon class="mr-4 w-5" /> <span class="mt-1">ইশা</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Isha }}</td>
                                </tr>
                                <!-- <tr class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <td class="py-3">রাত্রি ১ম প্রহর</td>
                                <td class="py-3">{{ prying_time.Firstthird }}</td>
                            </tr> -->
                                <tr
                                    class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-3">
                                        <div class="ml-6 flex justify-start"><MoonStar class="mr-4 w-5" /> <span class="mt-1">মধ্যরাত</span></div>
                                    </td>
                                    <td class="py-3">{{ prying_time.Midnight }}</td>
                                </tr>
                                <!-- <tr class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <td class="py-3">রাত্রি ৩য় প্রহর</td>
                                <td class="py-3">{{ prying_time.Lastthird }}</td>
                            </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checklist & Tasks -->
        <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-lg bg-amber-100 p-4 dark:bg-gray-800">
                <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">সালাত ট্র্যাকার</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="bg-amber-200 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
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
                                    <Checkbox :model-value="salat.owned" @click="salatAction(salat.id)" />
                                </td>
                                <td class="py-8">
                                    <input
                                        v-model="salat.sunnah_rakat"
                                        @change="sunnahAction(salat.id, salat.sunnah_rakat)"
                                        type="number"
                                        min="0"
                                        class="h-5 w-14 rounded border border-gray-300 bg-white text-center text-amber-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400 dark:focus:ring-gray-800"
                                    />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-lg bg-amber-100 p-4 dark:bg-gray-800">
                <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">কুরআন ট্র্যাকার</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="bg-amber-200 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
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
                                        class="w-18 h-8 rounded border border-gray-300 bg-white text-center text-amber-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400 dark:focus:ring-gray-800"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        v-model.lazy="quran.page"
                                        @change="quranAction()"
                                        type="number"
                                        min="0"
                                        class="w-18 h-8 rounded border border-gray-300 bg-white text-center text-amber-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400 dark:focus:ring-gray-800"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        v-model.lazy="quran.para"
                                        @change="quranAction()"
                                        type="number"
                                        min="0"
                                        class="w-18 h-8 rounded border border-gray-300 bg-white text-center text-amber-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400 dark:focus:ring-gray-800"
                                    />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="relative mt-14 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="bg-amber-200 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-lg font-bold">দিনের কাজ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="bg-amber-100 py-2 font-medium dark:bg-gray-900" style="line-height: 20px">
                                    <p class="">সাফল্য অর্জনের জন্যে সূরা আল-মূমিনূনের প্রথম ১৫ টি আয়াত অর্থ সহ পড়ুন।</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="bg-amber-200 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-lg font-bold">দিনের দোয়া</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="bg-amber-100 py-2 font-medium dark:bg-gray-900" style="line-height: 20px">
                                    <p class="">رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ</p>
                                    <p>(সূরা বাকারা: ২০১)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-lg bg-amber-100 p-4 dark:bg-gray-800">
                <h2 class="mb-3 text-sm font-bold text-gray-600 dark:text-gray-400">দৈনিক চেকলিস্ট</h2>
                <div class="">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                            <thead class="bg-amber-200 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
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
                                        <Checkbox :model-value="task.owned" @click="doAction(task.id)" />
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
import Checkbox from '@/components/ui/checkbox/Checkbox.vue';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { Head, router } from '@inertiajs/vue3';
import moment from 'moment-hijri';
import Swal from 'sweetalert2';
import { ref } from 'vue';

import { Moon, MoonStar, Sun, SunDim, Sunrise, Sunset, Locate } from 'lucide-vue-next';

const props = defineProps({
    date: String,
    hijri_date_adjust: String,
    salats: Object,
    quran_data: Object,
    tasks: Object,
    todays_ayat: Object,
    prying_time: Object,
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
        { ayat: quran.value.ayat, page: quran.value.page, para: quran.value.para, date: date.value },
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
const convertToBengaliNumber = (num) => num.replace(/\d/g, (d) => '০১২৩৪৫৬৭৮৯'[d]);

// Define Bengali month names mapping
const bengaliMonths = {
    Muharram: 'মুহররম',
    Safar: 'সফর',
    "Rabi' al-Awwal": 'রবিউল আউয়াল',
    "Rabi' al-Thani": 'রবিউস সানি',
    'Jumada al-Ula': 'জমাদিউল আউয়াল',
    'Jumada al-Alkhirah': 'জমাদিউস সানি',
    Rajab: 'রজব',
    'Sha’ban': "শা'বান",
    Ramadhan: 'রমজান',
    Shawwal: 'শাওয়াল',
    'Thul-Qi’dah': 'জ্বিলকদ',
    'Thul-Hijjah': 'জ্বিলহজ্জ',
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
