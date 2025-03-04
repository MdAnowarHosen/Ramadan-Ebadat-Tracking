<template>
    <Card :class="cn(props.class)">
        <CardTitle class="pt-5 ml-2">{{ props.title }}</CardTitle>
        <CardHeader class="-mt-5 -ml-3 text-gray-600 dark:text-gray-300">{{ props.header }}</CardHeader>
        <CardContent>
            <main>
                <slot></slot>
            </main>
            <CardDescription class="mt-5">{{ props.description }}</CardDescription>
        </CardContent>
        <CardFooter class="text-gray-400 ">{{ props.footer }}</CardFooter>
    </Card>
</template>

<script lang="ts" setup>
import Card from '../ui/card/Card.vue';
import CardContent from '../ui/card/CardContent.vue';
import CardDescription from '../ui/card/CardDescription.vue';
import CardFooter from '../ui/card/CardFooter.vue';
import CardHeader from '../ui/card/CardHeader.vue';
import CardTitle from '../ui/card/CardTitle.vue';
import { cn } from '@/lib/utils';


// define props
const props = defineProps({
    title: {
        type: String,
        required: false,
    },
    header: {
        type: String,
        required: false,
    },
    description: {
        type: String,
        required: false,
    },
    footer: {
        type: String,
        required: false,
    },
    class: {
        type: [String, Array, Object] as PropType<string | string[] | Record<string, boolean>>,
        required: false,
        default: '',
    },
});
</script>
