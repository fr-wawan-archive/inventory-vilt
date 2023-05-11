<template>
    <Navbar></Navbar>
    <section class="bg-sky-800 w-full py-10">
        <div class="flex justify-between px-32 items-center">
            <div class="text-white">
                <h1 class="text-4xl font-bold uppercase">Inventory</h1>
                <p class="mt-5">
                    Inventory membantu memberikan informasi barang digudang
                    secara menyeluruh dan lengkap serta permintaan barang dapat
                    dilakukan dimana saja.
                </p>
            </div>
            <div>
                <img
                    src="https://inventory.appdev.my.id/gudang.svg"
                    alt=""
                    class="w-7/12 ml-auto"
                />
            </div>
        </div>
    </section>

    <section class="flex justify-center gap-10">
        <div v-for="cat in category">
            <h1>Daftar Kategori</h1>
            <CategoryCard>
                <template v-slot:svg>
                    <img :src="`storage/${cat.image}`" class="w-10" alt="" />
                </template>
                <template v-slot:link>
                    <div>
                        <Link href="categories/">Category</Link>
                        <p class="text-sm text-gray-500">{{ categories }}</p>
                    </div>
                </template>
            </CategoryCard>
        </div>

        <div>
            <h1>Daftar Produk</h1>

            <div v-for="product in products" class="flex justify-center">
                <Card
                    :title="product.name"
                    :src="`storage/${product.image}`"
                    :description="product.description"
                ></Card>
            </div>
        </div>
    </section>
</template>

<script setup>
import Navbar from "../../Shared/NavbarIndex.vue";
import Card from "../../Shared/Card.vue";
import CategoryCard from "../../Shared/CategoryCard.vue";

defineProps({
    products: Object,
    category: Object,
});
</script>
