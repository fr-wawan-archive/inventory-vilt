<template>
    <div class="flex flex-col overflow-clip">
        <div class="flex flex-1">
            <div
                class="bg-[#3B4252] w-64 h-screen z-1 p-4 gap-4 flex flex-col shadow-md sticky top-0 left-0 min-h-[100vh]"
            >
                <div
                    class="w-full h-12 text-white"
                    id="sidenav-1"
                    data-te-sidenav-init
                    data-te-sidenav-hidden="false"
                    data-te-sidenav-position="absolute"
                >
                    <a
                        href=""
                        class="text-xl font-bold uppercase flex justify-center mt-2"
                        >Inventory</a
                    >
                    <ul class="mt-16">
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
                                <path d="M7 12a5 5 0 0 1 5 -5"></path></svg
                            >Dashboard
                        </li>
                    </ul>
                    <ul class="mb-16">
                        <span class="text-gray-500 uppercase font-bold text-xs"
                            >Admin</span
                        >

                        <li class="my-3 text-gray-400 hover:text-white">
                            <a class="flex gap-3" href="/suppliers/"
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
                                    ></path></svg
                                >Suppliers</a
                            >
                        </li>
                        <li class="text-gray-400 hover:text-white my-5">
                            <a class="flex gap-3" href="/categories/"
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
                                    ></path></svg
                                >Categories</a
                            >
                        </li>

                        <li class="text-gray-400 hover:text-white">
                            <a class="flex gap-3" href="/products/"
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
                                    <path d="M6 5l14 1l-1 7h-13"></path></svg
                                >Product</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full">
                <nav class="bg-white p-5 shadow-sm">
                    <div class="flex justify-end mt-1">
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
import Notification from "./Notification.vue";
</script>
