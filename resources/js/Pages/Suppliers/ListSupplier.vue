<template>
    <Head>
        <title>List Suppliers</title>
    </Head>
    <div v-if="$page.props.flash.message" class="m-auto">
        <Notification />
    </div>
    <div class="m-7 mt-8">
        <Link
            href="/suppliers/create"
            preserve-state
            class="p-3 bg-[#4C566A] hover:bg-[#81A1C1] text-white rounded-md"
            ><i class="fa fa-sharp fa-solid fa-plus"></i> New Supplier
        </Link>
    </div>
    <div class="flex justify-center">
        <div class="bg-white w-full shadow-lg mx-7 mb-10">
            <Search title="list Suppliers">
                <input
                    type="text"
                    placeholder="Search.."
                    class="p-2 border border-black"
                    v-model="search"
                />
            </Search>
            <Table class="mt-3" :headers="['Name', 'Address', 'Phone']">
                <tr v-for="supplier in suppliers.data" class="border-b">
                    <td class="whitespace px-6 py-4">
                        {{ supplier.name }}
                    </td>
                    <td class="whitespace px-6 py-4">
                        {{ supplier.address }}
                    </td>
                    <td class="whitespace px-6 py-4">
                        {{ supplier.phone }}
                    </td>
                    <td class="flex gap-3 justify-center items-center mt-2">
                        <Link
                            :href="`/suppliers/${supplier.id}/edit`"
                            preserve-scroll
                            class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5 bg-[#5E81AC] hover:bg-[#81A1C1]"
                            >Edit</Link
                        >
                        <DeleteModal
                            name="Delete"
                            title="Delete"
                            :href="`/suppliers/${supplier.id}`"
                        >
                        </DeleteModal>
                    </td>
                </tr>
                <template v-slot:pagination>
                    <div class="mt-5 flex justify-center">
                        <Pagination :links="suppliers.links" />
                    </div>
                </template>
            </Table>
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
    suppliers: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    _.debounce((value) => {
        router.get(
            "/suppliers",
            { search: value },
            {
                preserveState: true,
            }
        );
    }, 200)
);
</script>
