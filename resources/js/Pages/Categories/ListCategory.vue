<template>
    <Head>
        <title>List Category</title>
    </Head>
    <div v-if="$page.props.flash.message" class="m-auto">
        <Notification />
    </div>
    <div class="m-7 mt-8">
        <Link
            href="/suppliers/create"
            class="p-3 bg-[#4C566A] hover:bg-[#81A1C1] text-white rounded-md"
            ><i class="fa fa-sharp fa-solid fa-plus"></i> New Category
        </Link>
    </div>
    <div class="flex justify-center">
        <div class="bg-white w-full shadow-lg mx-7">
            <Search title="List Category">
                <input
                    type="text"
                    placeholder="Search.."
                    class="p-2 border border-black"
                    v-model="search"
                />
            </Search>
            <Table class="mt-3" :headers="['Name', 'Images']">
                <tr v-for="category in categories.data" class="border-b">
                    <td class="whitespace px-6 py-4">
                        {{ category.name }}
                    </td>
                    <td class="whitespace px-6 py-4">
                        <div
                            v-if="
                                category.image !==
                                'http://127.0.0.1:8000/storage'
                            "
                        >
                            <img
                                :src="category.image_url"
                                class="w-14 mx-auto"
                                alt=""
                            />
                        </div>
                        <div v-else>No image</div>
                    </td>
                    <td class="mt-2">
                        <Link
                            :href="`/categories/${category.id}/edit`"
                            class="inline-block rounded-sm text-white font-medium text-sm p-2 mr-3 px-5 bg-[#5E81AC] hover:bg-[#81A1C1]"
                            >Edit</Link
                        >
                        <DeleteModal
                            name="Delete"
                            title="Delete"
                            :href="`/categories/${category.id}`"
                        >
                        </DeleteModal>
                    </td>
                </tr>
            </Table>
            <div class="p-4">
                <Pagination :links="categories.links" />
            </div>
        </div>
    </div>
</template>
<script setup>
import Input from "../../Shared/Input.vue";
import Table from "../../Shared/Table.vue";
import { useForm } from "@inertiajs/vue3";
import Pagination from "../../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import _ from "lodash";
import Search from "../../Shared/Search.vue";
import Submit from "../../Shared/Submit.vue";
import Notification from "../../Shared/Notification.vue";
import DeleteModal from "../../Shared/DeleteModal.vue";

const props = defineProps({
    categories: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    _.debounce((value) => {
        router.get(
            "/categories",
            { search: value },
            {
                preserveState: true,
            }
        );
    }, 200)
);

const form = useForm({
    name: "",
    image: "",
});
</script>
