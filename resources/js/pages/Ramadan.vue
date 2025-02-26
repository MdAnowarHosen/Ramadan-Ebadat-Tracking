<template>
    <Head title="হোম"></Head>

    <div class="max-w-4xl p-6 mx-auto rounded-lg shadow-lg bg-amber-50 dark:bg-gray-700">
        <!-- Header -->
        <div class="flex items-center justify-between pb-4 border-b">
            <div>
                <!-- <p>১ রমাদান ১৪৪০</p> -->
            </div>
            <div class="px-4 py-2 font-medium text-gray-600 rounded bg-amber-400 dark:bg-gray-800 dark:text-gray-400">১ রমাদান</div>
            <div>
                <!-- <p>১ ভাদ্র ১৪৪০</p> -->
            </div>
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
            <!-- Ayat of the Day -->
            <div class="p-4 rounded-lg bg-amber-100 dark:bg-gray-800">
                <h2 class="text-lg font-bold text-gray-600 dark:text-gray-400">দিনের আয়াত</h2>
                <p class="mt-2 text-right text-gray-600 dark:text-gray-400">
                    وَمَا خَلَقْتُ الْجِنَّ وَالْإِنسَ إِلَّا لِيَعْبُدُونِ <br />
                    (الذاريات: ৫৬)
                </p>
                <p class="mt-2 text-gray-600 dark:text-gray-400">আমার ইবাদত করা ছাড়া আমি মানব ও জিন জাতি সৃষ্টি করিনি।</p>
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
                                <th scope="col" class="px-2 py-5">সুন্নত</th>
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
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 bg-white border-gray-300 rounded-sm text-amber-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-800 dark:text-blue-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        type="number"
                                        min="0"
                                        class="h-5 bg-white border border-gray-300 rounded w-14 dark:border-gray-600 dark:bg-gray-600"
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
                                        type="number"
                                        min="0"
                                        class="w-10 h-8 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        type="number"
                                        min="0"
                                        class="w-10 h-8 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600"
                                    />
                                </td>
                                <td class="py-8">
                                    <input
                                        type="number"
                                        min="0"
                                        class="w-10 h-8 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600"
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
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm dark:8ocus:ring-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800"
                                            type="checkbox"
                                        />
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
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    salats: Object,
    tasks: Object,
});
</script>
