<script setup>
import { useForm } from "@inertiajs/vue3";
import Input from "../../Shared/Input.vue";
import Modal from "../../Shared/Modal.vue";
import Submit from "../../Shared/Submit.vue";
import Notification from "../../Shared/Notification.vue";
import { ref } from "vue";

const props = defineProps({
    supplier: Object,
});

const form = useForm({
    name: props.supplier.name,
    address: props.supplier.address,
    phone: props.supplier.phone,
    onSuccess: () => {
        close();
    },
});

const modalRef = ref();

function close() {
    console.log("Closing modal");
    modalRef.value.closeModal();
}
</script>

<template>
    <Modal title="Edit Suppliers" ref="modalRef">
        <template #title> Edit Supplier </template>

        <form
            class="mt-6"
            @submit.prevent="form.put(`/suppliers/${supplier.id}`)"
            @inertia.success="close()"
        >
            <Input name="name" placeholder="Supplier Name" v-model="form.name">
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
            <button
                type="submit"
                @click="close"
                class="text-white bg-[#2E3440] hover:bg-[#434C5E] py-2 px-4 text-sm"
            >
                <i class="fa text-sm fa-light fa-check"></i> Submit
            </button>
        </form>
    </Modal>
</template>
