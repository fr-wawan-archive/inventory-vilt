<script setup>
import { useForm } from "@inertiajs/vue3";
import Input from "../../Shared/Input.vue";
import Modal from "../../Shared/Modal.vue";
import { ref } from "vue";

const props = defineProps({
    supplier: Object,
});

const form = useForm({
    name: "",
    address: "",
    phone: "",
    onSuccess: () => {
        close();
    },
});

const modalRef = ref();

function close() {
    console.log("Closing modal");
    modalRef.value.close;
}
</script>

<template>
    <Modal title="Edit Suppliers" ref="modalRef">
        <template #title> Create Supplier </template>

        <form
            class="mt-6"
            @submit.prevent="form.post(/suppliers/)"
            @inertia.success="close()"
        >
            <Input name="name" placeholder="Supplier Name" v-model="form.name">
                Supplier Name
            </Input>
            <div class="text-red-500" v-if="$page.props.errors.name">
                {{ $page.props.errors.name }}
            </div>
            <Input
                name="address"
                placeholder="Supplier Address"
                v-model="form.address"
            >
                Supplier Address
            </Input>
            <div class="text-red-500" v-if="$page.props.errors.address">
                {{ $page.props.errors.address }}
            </div>
            <Input
                name="phone"
                placeholder="Supplier Phone"
                v-model="form.phone"
            >
                Supplier Phone
            </Input>
            <div class="text-red-500" v-if="$page.props.errors.phone">
                {{ $page.props.errors.phone }}
            </div>
            <div class="my-5">
                <button
                    type="submit"
                    @click="close"
                    class="text-white bg-[#2E3440] hover:bg-[#434C5E] py-2 px-4 text-sm"
                >
                    <i class="fa text-sm fa-light fa-check"></i> Submit
                </button>
            </div>
        </form>
    </Modal>
</template>
