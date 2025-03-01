<template>
    <div>
        <AppNav />
        <div class="w-full max-w-screen-xl mx-auto">
            <main>
                <slot />
            </main>
        </div>
        <AppFooter />
    </div>
</template>

<script lang="ts" setup>
import AppFooter from './app/frontend/AppFooter.vue';
import AppNav from './app/frontend/AppNav.vue';
</script>
