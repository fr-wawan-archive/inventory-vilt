<template>
    <Head>
        <title>Dashboard</title>
    </Head>

    <div class="grid grid-cols-5 gap-5 px-8 mt-10">
        <div class="bg-white p-5 rounded-lg flex gap-3">
            <div class="bg-blue-400 p-3 flex items-center rounded-lg">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-layout-grid-add"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="#ffffff"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <rect x="4" y="4" width="6" height="6" rx="1" />
                    <rect x="14" y="4" width="6" height="6" rx="1" />
                    <rect x="4" y="14" width="6" height="6" rx="1" />
                    <path d="M14 17h6m-3 -3v6" />
                </svg>
            </div>
            <div>
                <Link href="Categories/">Category</Link>
                <p class="text-sm text-gray-500">{{ categories }}</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg flex gap-3">
            <div class="bg-red-600 p-3 rounded-lg flex items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-truck"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="#ffffff"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="7" cy="17" r="2" />
                    <circle cx="17" cy="17" r="2" />
                    <path
                        d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"
                    />
                </svg>
            </div>
            <div>
                <Link href="suppliers/">Supplier</Link>
                <p class="text-sm text-gray-500">{{ suppliers }}</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg flex gap-3">
            <div class="bg-blue-600 p-3 rounded-lg flex items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-shopping-cart"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="#ffffff"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="6" cy="19" r="2" />
                    <circle cx="17" cy="19" r="2" />
                    <path d="M17 17h-11v-14h-2" />
                    <path d="M6 5l14 1l-1 7h-13" />
                </svg>
            </div>
            <div>
                <Link href="products/">Products</Link>
                <p class="text-sm text-gray-500">{{ products }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    suppliers: Number,
    categories: Number,
    products: Number,
});
</script>
