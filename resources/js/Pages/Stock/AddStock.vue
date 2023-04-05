<script setup>
import { useForm } from "@inertiajs/vue3";
import Input from "../../Shared/Input.vue";
import Modal from "../../Shared/Modal.vue";
import { ref } from "vue";

const props = defineProps({
    product: Object,
});

const form = useForm({
    stock: props.product[0].stock,
});
const modalRef = ref();

function close() {
    console.log("Closing modal");
    modalRef.value.close;
}
</script>

<template>
    <Modal title="Add Stock" ref="modalRef">
        <form
            class="mt-6"
            @submit.prevent="form.put(`/stock/${product[0].id}/update`)"
            enctype="multipart/form-data"
        >
            <Input
                name="name"
                type="number"
                placeholder="Stock"
                v-model="form.stock"
            >
            </Input>

            <div class="mt-5">
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
