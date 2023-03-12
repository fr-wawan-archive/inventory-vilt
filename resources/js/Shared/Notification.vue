<template>
    <div
        class="text-white px-6 py-4 border-0 relative mb-4 bg-green-500"
        v-if="isShowing"
    >
        <span class="text-xl inline-block mr-5 align-middle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-circle-check"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M9 12l2 2l4 -4"></path>
            </svg>
        </span>
        <span class="inline-block align-middle mr-8">
            {{ $page.props.flash.message }}
        </span>
        <button
            class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
            @click="isShowing = false"
        >
            <span>×</span>
        </button>
    </div>
</template>

<script setup>
import { TransitionRoot, TransitionChild } from "@headlessui/vue";
import { ref } from "vue";
const isShowing = ref(true);
</script>
