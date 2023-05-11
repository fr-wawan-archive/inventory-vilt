<template>
    <div class="bg-white p-5 rounded-lg flex gap-3 shadow-sm">
        <div class="p-3 flex items-center rounded-lg" :class="bgColor">
            <slot name="svg" />
        </div>
        <slot name="link" />
    </div>
</template>

<script setup>
defineProps({
    bgColor: String,
});
</script>
