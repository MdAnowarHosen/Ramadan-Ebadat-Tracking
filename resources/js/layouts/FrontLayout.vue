<template>
    <div>
        <AppNav/>
        <main>
            <slot />
        </main>
        <AppFooter/>
    </div>
</template>

<script lang="ts" setup>
import AppFooter from './app/frontend/AppFooter.vue';
import AppNav from './app/frontend/AppNav.vue';
</script>
