<template>
    <div class="flex justify-end">
        <div class="bg-white shadow-lg w-7/12 my-10">
            <div v-if="$page.props.flash.message" class="alert m-auto">
                <Notification />
            </div>
            <Search v-model="search" class="mt-5">List Suppliers</Search>
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
                    <td>
                        <Link
                            :href="`/suppliers/${supplier.id}/edit`"
                            class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5 bg-[#5E81AC] hover:bg-[#81A1C1]"
                            >Edit</Link
                        >
                        <DeleteModal name="Delete" title="Delete"></DeleteModal>
                    </td>
                </tr>
            </Table>
            <div class="p-4">
                <Pagination :links="suppliers.links" />
            </div>
        </div>

        <div
            class="bg-white pt-3 w-3/12 mr-5 ml-10 my-10 shadow-lg"
            style="height: 420px"
        >
            <form
                @submit.prevent="form.post('/suppliers')"
                class="w-11/12 mx-auto"
            >
                <div class="border-b">
                    <h1 class="text-lg font-bold my-2">Create Suppliers</h1>
                </div>
                <Input
                    name="name"
                    placeholder="Supplier name"
                    v-model="form.name"
                >
                    Supplier Name
                </Input>
                <Input
                    name="address"
                    placeholder="Supplier Address"
                    v-model="form.address"
                >
                    Supplier Address
                </Input>
                <Input
                    name="phone"
                    placeholder="Supplier Phone"
                    v-model="form.phone"
                >
                    Supplier Phone
                </Input>
                <Submit />
            </form>
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
import { usePage } from "@inertiajs/vue3";
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

const form = useForm({
    name: "",
    address: "",
    phone: "",
});
</script>
