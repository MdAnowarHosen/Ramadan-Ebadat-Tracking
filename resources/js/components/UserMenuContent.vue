<script setup lang="ts">
import UserInfo from '@/components/UserInfo.vue';
import { DropdownMenuGroup, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator } from '@/components/ui/dropdown-menu';
import type { User } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LogOut, Settings } from 'lucide-vue-next';
import { useForm } from '@inertiajs/vue3';

interface Props {
    user: User;
}

defineProps<Props>();

const form = useForm({});
function logout() {
    form.post(route('logout'), {
        onSuccess: () => {
            window.location.reload(); // Force full reload after logout
        },
    });
    }
</script>

<template>
    <DropdownMenuLabel class="p-0 font-normal">
        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
            <UserInfo :user="user" :show-email="true" />
        </div>
    </DropdownMenuLabel>
    <DropdownMenuSeparator />
    <DropdownMenuGroup>
        <DropdownMenuItem :as-child="true">
            <Link class="block w-full" :href="route('admin.profile.edit')" as="button">
                <Settings class="w-4 h-4 mr-2" />
                Settings
            </Link>
        </DropdownMenuItem>
    </DropdownMenuGroup>
    <DropdownMenuSeparator />
    <!-- <DropdownMenuItem :as-child="true">
        <Link class="block w-full" method="post" :href="route('logout')" as="button">
            <LogOut class="w-4 h-4 mr-2" />
            Log out
        </Link>
    </DropdownMenuItem> -->

    <DropdownMenuItem :as-child="true">
    <button class="block w-full" @click="logout">
        <LogOut class="w-4 h-4 mr-2" />
        Log out
    </button>
</DropdownMenuItem>

</template>
