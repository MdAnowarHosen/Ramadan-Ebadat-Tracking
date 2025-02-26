<template>
    <nav class="mb-5 border-gray-200 bg-amber-50 dark:border-gray-700 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-400">Flowbite</span>
            </a>
            <button
                data-collapse-toggle="navbar-dropdown"
                type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                aria-controls="navbar-dropdown"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border rounded-lg border-amber-400 bg-amber-50 dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0 md:dark:bg-gray-900 rtl:space-x-reverse"
                >
                    <li>
                        <a
                            href="#"
                            class="block px-3 py-2 text-gray-800 rounded-sm activeNavLink md:hover:text-amber-700 md:bg-transparent md:p-0 dark:text-gray-400 md:dark:bg-transparent md:dark:hover:text-gray-300"
                            aria-current="page"
                            >Home</a
                        >
                    </li>
                    <li>
                        <button
                            id="dropdownNavbarLink"
                            data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full px-3 py-2 text-gray-800 rounded-sm hover:bg-gray-100 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-amber-700 md:dark:hover:bg-transparent md:dark:hover:text-gray-300"
                        >
                            Dropdown
                            <svg class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:divide-gray-600 dark:bg-gray-700"
                        >
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >Sign out</a
                                >
                            </div>
                        </div>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block px-3 py-2 text-gray-800 rounded-sm hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-amber-700 md:dark:hover:bg-transparent md:dark:hover:text-gray-300"
                            >Services</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block px-3 py-2 text-gray-800 rounded-sm hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-amber-700 md:dark:hover:bg-transparent md:dark:hover:text-gray-300"
                            >Pricing</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block px-3 py-2 text-gray-800 rounded-sm hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-amber-700 md:dark:hover:bg-transparent md:dark:hover:text-gray-300"
                            >Contact</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
