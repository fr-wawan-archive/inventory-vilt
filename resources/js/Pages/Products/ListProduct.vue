<template>
    <Head>
        <title>List Suppliers</title>
    </Head>
    <div v-if="$page.props.flash.message" class="m-auto">
        <Notification />
    </div>
    <div class="m-7 mt-8">
        <Link
            href="/products/create"
            class="p-3 bg-[#4C566A] hover:bg-[#81A1C1] text-white rounded-md"
            ><i class="fa fa-sharp fa-solid fa-plus"></i> New Product
        </Link>
    </div>
    <div class="flex justify-center">
        <div class="bg-white w-full shadow-lg mx-7 mb-10">
            <Search title="List Products">
                <input
                    type="text"
                    placeholder="Search.."
                    class="p-2 border border-black"
                    v-model="search"
                />
            </Search>
            <Table
                class="mt-3"
                :headers="['image', 'name', 'supplier', 'category', 'unit']"
            >
                <tr v-for="product in products.data" class="border-b">
                    <td class="whitespace px-6 py-4">
                        <div
                            v-if="
                                product.image_url !==
                                'http://127.0.0.1:8000/storage'
                            "
                        >
                            <img
                                :src="product.image_url"
                                class="w-14 mx-auto"
                                alt=""
                            />
                        </div>
                        <div v-else>No image</div>
                    </td>

                    <td class="whitespace px-6 py-4">
                        {{ product.name }}
                    </td>
                    <td class="whitespace px-6 py-4">
                        {{ product.supplier_name }}
                    </td>
                    <td class="whitespace px-6 py-4">
                        {{ product.category_name }}
                    </td>
                    <td class="whitespace px-6 py-4">
                        {{ product.unit }}
                    </td>
                    <td class="flex gap-3 justify-center items-center mt-2">
                        <Link
                            :href="`/products/${product.id}/edit`"
                            class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5 bg-[#5E81AC] hover:bg-[#81A1C1]"
                            >Edit</Link
                        >
                        <DeleteModal
                            name="Delete"
                            title="Delete"
                            :href="`/products/${product.id}`"
                        >
                        </DeleteModal>
                    </td>
                </tr>
            </Table>
            <div class="p-4">
                <Pagination :links="products.links" />
            </div>
        </div>
    </div>
</template>
<script setup>
import Table from "../../Shared/Table.vue";
import Pagination from "../../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import _ from "lodash";
import Search from "../../Shared/Search.vue";
import Notification from "../../Shared/Notification.vue";
import DeleteModal from "../../Shared/DeleteModal.vue";

const props = defineProps({
    products: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    _.debounce((value) => {
        router.get(
            "/products",
            { search: value },
            {
                preserveState: true,
            }
        );
    }, 200)
);
</script>
