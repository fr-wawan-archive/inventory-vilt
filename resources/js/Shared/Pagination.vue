<template>
    <div class="mb-10 flex justify-center">
        <Link
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            class="block rounded md:px-4 md:py-3 p-3 transition-all duration-300 hover:bg-neutral-100 text-sm"
            :class="{
                'bg-slate-300 hover:bg-neutral-200': link.active,
            }"
        ></Link>
    </div>
</template>

<script setup>
defineProps({
    links: Object,
});
</script>
