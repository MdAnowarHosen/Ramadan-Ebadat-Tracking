<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import UserMenuContentFront from '@/components/UserMenuContentFront.vue';
import { getInitials } from '@/composables/useInitials';
import type { BreadcrumbItem, NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { BookAIcon, BookOpen, Folder, HouseIcon, LayoutGrid, LogInIcon, Menu, UserPlus } from 'lucide-vue-next';
import { computed } from 'vue';
import AppearanceToggle from '@/components/AppearanceToggle.vue';

interface Props {
    breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage();
const auth = computed(() => page.props.auth);

const isCurrentRoute = (url: string) => {
    return page.url === url;
};

const activeItemStyles = computed(() => (url: string) => (isCurrentRoute(url) ? 'text-neutral-900 bg-gray-100 md:bg-amber-100 dark:bg-neutral-800 dark:text-neutral-100' : ''));

const mainNavItems: NavItem[] = [
    {
        title: 'হোম',
        href: '/',
        icon: HouseIcon,
        for: '',
    },
    {
        title: 'রিপর্ট',
        href: '/report',
        icon: BookAIcon,
        for: 'user',
    },
];

const rightNavItems: NavItem[] = [
    {
        title: 'লগ ইন',
        href: '/login',
        icon: LogInIcon,
        for: 'guest',
    },
    {
        title: 'রেজিস্টার',
        href: '/register',
        icon: UserPlus,
        for: 'guest',
    },

];
</script>

<template>
    <div>
        <div class="border-b border-amber-300 dark:border-gray-700 border-sidebar-border/80 bg-amber-50 dark:bg-gray-800">
            <div class="flex items-center h-16 px-4 mx-auto md:max-w-7xl">
                <!-- Mobile Menu -->
                <div class="lg:hidden">
                    <Sheet>
                        <SheetTrigger :as-child="true">
                            <Button variant="ghost" size="icon" class="mr-2 h-9 w-9">
                                <Menu class="w-5 h-5" />
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="left" class="w-[300px] p-6">
                            <SheetTitle class="sr-only">মেনু</SheetTitle>
                            <SheetHeader class="flex justify-start text-left">
                                <AppLogoIcon class="text-black fill-current size-6 dark:text-white" />
                            </SheetHeader>
                            <div class="flex flex-col justify-between flex-1 h-full py-6 space-y-4">
                                <nav class="-mx-3 space-y-1">
                                    <Link
                                        v-for="item in mainNavItems"
                                        :key="item.title"
                                        :href="item.href"
                                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg gap-x-3 hover:bg-accent"
                                        :class="activeItemStyles(item.href)"
                                    >
                                        <component v-if="item.icon" :is="item.icon" class="w-5 h-5" />
                                        {{ item.title }}
                                    </Link>
                                </nav>
                                <div class="flex flex-col space-y-4">
                                    <a
                                        v-for="item in rightNavItems"
                                        :key="item.title"
                                        :href="item.href"
                                        rel="noopener noreferrer"
                                        class="flex items-center space-x-2 text-sm font-medium"
                                    >
                                        <div  v-if="!(item.for === 'guest' && auth.user || item.for === 'user' && !auth.user)">
                                            <component v-if="item.icon" :is="item.icon" class="w-5 h-5" />
                                            <span>{{ item.title }}</span>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </SheetContent>
                    </Sheet>
                </div>

                <Link :href="route('home')" class="flex items-center gap-x-2">
                    <AppLogo class="hidden h-6 xl:block" />
                </Link>

                <!-- Desktop Menu -->
                <div class="hidden h-full lg:flex lg:flex-1">
                    <NavigationMenu class="flex items-stretch h-full ml-10">
                        <NavigationMenuList class="flex items-stretch h-full space-x-2">
                            <NavigationMenuItem v-for="(item, index) in mainNavItems" :key="index" class="relative flex items-center h-full">
                                <Link :href="item.href"  v-if="!(item.for === 'guest' && auth.user || item.for === 'user' && !auth.user)">
                                    <NavigationMenuLink
                                        :class="[navigationMenuTriggerStyle(), activeItemStyles(item.href), 'h-9 cursor-pointer px-3 bg-yellow-50 dark:bg-gray-800']"
                                    >
                                        <component v-if="item.icon" :is="item.icon" class="w-4 h-4 mr-2" />
                                        {{ item.title }}
                                    </NavigationMenuLink>
                                </Link>
                                <div class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-amber-300 dark:bg-gray-600"></div>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>

                <div class="flex items-center ml-auto space-x-2">
                    <div class="relative flex items-center space-x-1">
                        <!-- <Button variant="ghost" size="icon" class="cursor-pointer group h-9 w-9">
                            <Search class="size-5 opacity-80 group-hover:opacity-100" />
                        </Button> -->

                        <div class="hidden space-x-1 lg:flex">
                            <template v-for="item in rightNavItems" :key="item.title">
                                <TooltipProvider :delay-duration="0"
                                v-if="!(item.for === 'guest' && auth.user || item.for === 'user' && !auth.user)" >
                                    <Tooltip>
                                        <TooltipTrigger>
                                            <Button variant="ghost" size="icon" as-child class="cursor-pointer group h-9 w-9">
                                                <a :href="item.href" rel="noopener noreferrer">
                                                    <span class="sr-only">{{ item.title }}</span>
                                                    <component :is="item.icon" class="size-5 opacity-80 group-hover:opacity-100" />
                                                </a>
                                            </Button>
                                        </TooltipTrigger>
                                        <TooltipContent>
                                            <p>{{ item.title }}</p>
                                        </TooltipContent>
                                    </Tooltip>
                                </TooltipProvider>
                            </template>
                        </div>
                    </div>

                    <DropdownMenu v-if="auth.user">
                        <DropdownMenuTrigger :as-child="true">
                            <Button
                                variant="ghost"
                                size="icon"
                                class="relative w-auto p-1 rounded-full size-10 focus-within:ring-2 focus-within:ring-primary"
                            >
                                <Avatar class="overflow-hidden rounded-full size-8" >
                                    <AvatarImage :src="auth.user.avatar" :alt="auth.user.name" />
                                    <AvatarFallback class="font-semibold text-black rounded-lg bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                                        {{ getInitials(auth.user?.name) }}
                                    </AvatarFallback>
                                </Avatar>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end" class="w-56">
                            <UserMenuContentFront :user="auth.user" />
                        </DropdownMenuContent>
                    </DropdownMenu>
                    <div>
                        <AppearanceToggle  class="mt-1 ml-3"/>
                    </div>

                </div>
            </div>
        </div>

        <div v-if="props.breadcrumbs.length > 1" class="flex w-full border-b border-sidebar-border/70">
            <div class="flex items-center justify-start w-full h-12 px-4 mx-auto text-neutral-500 md:max-w-7xl">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </div>
        </div>
    </div>
</template>

