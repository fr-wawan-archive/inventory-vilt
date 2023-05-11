<template>
    <div class="block w-60 rounded-lg bg-white shadow-lg">
        <a href="google.com">
            <img class="rounded-t-lg" :src="src" alt="product images" />
        </a>
        <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                {{ title }}
            </h5>
            <p class="mb-4 text-base text-neutral-600">{{ description }}</p>
            <button
                type="button"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                data-te-ripple-init
                data-te-ripple-color="light"
            >
                Order
            </button>
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: String,
    src: String,
    description: String,
});
</script>
