<script setup lang="ts">
import { useAppearance } from '@/composables/useAppearance';
import { ref, watchEffect } from 'vue';
import { Moon, Sun } from 'lucide-vue-next';

const { appearance, updateAppearance } = useAppearance();
const currentTheme = ref(appearance);

// Ensure `currentTheme` updates reactively
watchEffect(() => {
    currentTheme.value = appearance;
});

// Toggle theme
const toggleTheme = () => {
    const newTheme = currentTheme.value === 'dark' ? 'light' : 'dark';
    updateAppearance(newTheme);
};
</script>

<template>
    <button @click="toggleTheme" class="transition-all rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
        <component
            :is="currentTheme === 'dark' ? Sun : Moon"
            class="w-6 h-6 text-gray-800 dark:text-gray-300"
        />
    </button>
</template>
