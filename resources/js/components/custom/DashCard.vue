<template>
    <Card :class="cn(props.class)">
        <CardTitle class="pt-5 ml-2">{{ props.title }}</CardTitle>
        <CardHeader>{{ props.header }}</CardHeader>
        <CardContent
            >{{ props.content }}
            <CardDescription>{{ props.description }}</CardDescription>
        </CardContent>
        <CardFooter>{{ props.footer }}</CardFooter>
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
    content: {
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
