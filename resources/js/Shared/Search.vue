<template>
    <div class="flex mx-5 mt-6 justify-between">
        <h1 class="text-xl mt-1 font-bold">{{ title }}</h1>
        <slot />
    </div>
</template>

<script setup>
const props = defineProps({
    title: {
        type: String,
    },
});
</script>
