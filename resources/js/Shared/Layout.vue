<template>
    <div class="flex flex-col overflow-clip">
        <div class="flex flex-1">
            <div
                v-if="isShow"
                class="bg-[#3B4252] w-48 md:w-64 h-screen p-4 gap-4 flex flex-col shadow-md fixed sm:sticky top-0 left-0"
            >
                <div
                    class="w-full h-12 text-white"
                    id="sidenav-1"
                    data-te-sidenav-init
                    data-te-sidenav-hidden="false"
                    data-te-sidenav-position="absolute"
                >
                    <div
                        v-if="isMobile"
                        class="flex justify-end text-2xl mb-7 mr-3"
                    >
                        <button @click="isShow = false">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <a
                        href=""
                        class="text-xl font-bold uppercase flex justify-center mt-2"
                        >Inventory</a
                    >
                    <ul class="mt-10">
                        <span class="text-gray-500 uppercase font-bold text-xs"
                            >Dashboard</span
                        >
                        <li
                            class="text-gray-400 hover:text-white my-3 flex gap-3"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-gauge"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    stroke="none"
                                    d="M0 0h24v24H0z"
                                    fill="none"
                                ></path>
                                <path
                                    d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"
                                ></path>
                                <path
                                    d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"
                                ></path>
                                <path d="M13.41 10.59l2.59 -2.59"></path>
                                <path d="M7 12a5 5 0 0 1 5 -5"></path>
                            </svg>
                            Dashboard
                        </li>
                    </ul>
                    <ul class="mb-16">
                        <span class="text-gray-500 uppercase font-bold text-xs"
                            >Admin</span
                        >

                        <li class="my-3 text-gray-400 hover:text-white">
                            <Link class="flex gap-3" href="/suppliers/"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-truck"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        stroke="none"
                                        d="M1 0h24v24H0z"
                                        fill="none"
                                    ></path>
                                    <path
                                        d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"
                                    ></path>
                                    <path
                                        d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"
                                    ></path>
                                    <path
                                        d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"
                                    ></path>
                                </svg>
                                Suppliers</Link
                            >
                        </li>
                        <li class="text-gray-400 hover:text-white my-5">
                            <Link class="flex gap-3" href="/categories/"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-category-2"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                    ></path>
                                    <path d="M14 4h6v6h-6z"></path>
                                    <path d="M4 14h6v6h-6z"></path>
                                    <path
                                        d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"
                                    ></path>
                                    <path
                                        d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"
                                    ></path>
                                </svg>
                                Categories</Link
                            >
                        </li>

                        <li class="text-gray-400 hover:text-white">
                            <Link class="flex gap-3" href="/products/"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-shopping-cart"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                    ></path>
                                    <path
                                        d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"
                                    ></path>
                                    <path
                                        d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"
                                    ></path>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                                Product</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full">
                <nav class="bg-white p-5 shadow-sm">
                    <div class="flex justify-between mt-1">
                        <button @click="changeShow">
                            <div class="text-2xl">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                        </button>
                        <ul class="flex text-lg gap-5">
                            <li><a href="" class="text-">Home</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="">
                    <slot />

                    <Modal />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Modal } from "momentum-modal";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

let isShow = ref(false);

function changeShow() {
    isShow.value = isShow.value == false ? true : false;
}

const isMobile = ref(false);

function checkScreenSize() {
    const width = window.innerWidth;
    isMobile.value = width <= 767;
}

// Call checkScreenSize on component mount and window resize
window.addEventListener("load", checkScreenSize);
window.addEventListener("resize", checkScreenSize);
</script>
