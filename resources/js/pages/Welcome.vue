<script setup lang="ts"></script>

<template>
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-700">
        <!-- Header -->
        <div class="flex items-center justify-between pb-4 border-b">
            <img src="as-sunnah-logo.png" alt="As Sunnah Foundation" class="h-12" />
            <div class="px-4 py-2 text-white bg-red-500 rounded">১ রমাদান</div>
            <img src="ramadan-logo.png" alt="Ramadan Planner" class="h-12" />
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
            <!-- Ayat of the Day -->
            <div class="p-4 bg-green-100 rounded-lg">
                <h2 class="text-lg font-bold">দিনের আয়াত</h2>
                <p class="mt-2 text-right text-gray-700">
                    وَمَا خَلَقْتُ الْجِنَّ وَالْإِنسَ إِلَّا لِيَعْبُدُونِ <br />
                    (الذاريات: ৫৬)
                </p>
                <p class="mt-2 text-gray-600">আমার ইবাদত করা ছাড়া আমি মানব ও জিন জাতি সৃষ্টি করিনি।</p>
            </div>

            <!-- Hadith of the Day -->
            <div class="p-4 bg-green-100 rounded-lg">
                <h2 class="text-lg font-bold">দিনের হাদিস</h2>
                <p class="mt-2 text-gray-700">
                    যে ব্যক্তি ঈমানের সাথে পূর্বেকার গুনাহের জন্য রমাদানের রোজা রাখবে, তার পূর্বেকার সমস্ত গুনাহ মাফ করে দেয়া হবে।
                </p>
                <p class="text-gray-600">(সহিহ বুখারি, হাদিস: ৩৮)</p>
            </div>
        </div>

        <!-- Du'a Section -->
        <div class="p-4 mt-4 bg-red-100 rounded-lg">
            <h2 class="text-lg font-bold text-center">দিনের দোয়া</h2>
            <p class="mt-2 text-center text-gray-700">رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ</p>
            <p class="text-center text-gray-600">(সূরা বাকারা: ২০১)</p>
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
                                <th scope="col" class="px-2 py-5">ফজর</th>
                                <th scope="col" class="px-2 py-5">সুন্নত</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">ফজর</td>
                                <td class="py-8">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 bg-white border-gray-300 rounded-sm text-amber-600 dark:text-blue-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                </td>
                                <td class="py-8"><input type="number" min="0" class="w-10 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600 " /></td>
                            </tr>
                            <tr
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">যোহর</td>
                                <td class="py-8">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 bg-white border-gray-300 rounded-sm text-amber-600 dark:text-blue-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                </td>
                                <td class="py-8"><input type="number" min="0" class="w-10 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
                            </tr>
                            <tr
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">আসর</td>
                                <td class="py-8">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 bg-white border-gray-300 rounded-sm text-amber-600 dark:text-blue-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                </td>
                                <td class="py-8"><input type="number" min="0" class="w-10 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
                            </tr>
                            <tr
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">মাগরিব</td>
                                <td class="py-8">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 bg-white border-gray-300 rounded-sm text-amber-600 dark:text-blue-600 focus:ring-2 focus:ring-amber-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                </td>
                                <td class="py-8"><input type="number" min="0" class="w-10 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
                            </tr>
                            <tr
                                class="border-b border-gray-200 odd:bg-amber-100 even:bg-yellow-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-8">ইশা</td>
                                <td class="py-8">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                    />
                                </td>
                                <td class="py-8"><input type="number" min="0" class="w-10 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
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
                                <td class="py-8"><input type="number" min="0" class="w-10 h-8 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
                                <td class="py-8"><input type="number" min="0" class="w-10 h-8 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
                                <td class="py-8"><input type="number" min="0" class="w-10 h-8 bg-white border border-gray-300 rounded dark:border-gray-600 dark:bg-gray-600" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="relative overflow-x-auto shadow-md mt-14 sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-lg font-bold">দিনের কাজ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-2 font-bold" style="line-height: 20px">
                                    <p class="">সাফল্য অর্জনের জন্যে সূরা আল-মূমিনূনের প্রথম ১৫ টি আয়াত অর্থ সহ পড়ুন।</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-lg font-bold">দিনের কাজ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr
                                class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                            >
                                <td class="py-2 font-bold" style="line-height: 20px">
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
                            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-2 py-3">সম্পন্ন</th>
                                    <th scope="col" class="px-2 py-3">বিষয়</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>সকালের যিকর</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>সন্ধ্যার যিকর</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>দান-সাদাকা</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>দিনের কাজ</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>কমপক্ষ্যে ৭০ বার ইস্তেগফার</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>কুরআন তিলাওয়াত ও তাদাব্বুর</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>ঘুমের পূর্বের যিকর</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>দিনের দু'আ মুখস্থ</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>আল্লাহর নাম মুখস্থ</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>জামাআতে সালাত আদায়</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>নতুন কিছু শেখা</span></td>
                                </tr>
                                <tr
                                    class="border-b border-gray-200 odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                                >
                                    <td class="py-2">
                                        <input
                                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:8ocus:ring-blue-600"
                                            type="checkbox"
                                        />
                                    </td>
                                    <td class="py-2 text-sm"><span>দিনের হাদীস</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
