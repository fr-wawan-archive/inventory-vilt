<template>
    <Link :href="href">
        <div class="bg-white p-3 pr-24 rounded-lg flex gap-3 shadow-lg">
            <div class="flex items-center rounded-lg">
                <slot name="svg" />
            </div>
        </div>
    </Link>
</template>

<script setup>
defineProps({
    href: String,
});
</script>
