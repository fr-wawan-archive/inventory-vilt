<script setup>
import { useForm } from "@inertiajs/vue3";
import Input from "../../Shared/Input.vue";
import Modal from "../../Shared/Modal.vue";
import { ref } from "vue";

const props = defineProps({
    category: Object,
});

const form = useForm({
    name: "",
    image: null,
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
            @submit.prevent="form.post('/category')"
            @inertia.success="close()"
            enctype="multipart/form-data"
        >
            <Input name="name" placeholder="Supplier Name" v-model="form.name">
                Supplier Name
            </Input>
            <div class="text-red-500" v-if="$page.props.errors.name">
                {{ $page.props.errors.name }}
            </div>
            <div class="my-1">
                <label for="image">Category Images</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="p-2 w-full placeholder:text-gray-500 mt-2 bg-white border border-slate-400"
                    @input="form.image = $event.target.files[0]"
                />
            </div>
            <div class="text-red-500" v-if="$page.props.errors.image">
                {{ $page.props.errors.image }}
            </div>

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
