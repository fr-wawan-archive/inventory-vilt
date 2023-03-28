<script setup>
import { useForm } from "@inertiajs/vue3";
import Input from "../../Shared/Input.vue";
import Submit from "../../Shared/Submit.vue";

const props = defineProps({
    suppliers: Object,
    categories: Object,
});

const form = useForm({
    name: "",
    image: null,
    unit: "",
    description: "",
    category_id: "",
    supplier_id: "",
});
</script>

<template>
    <Head>
        <title>Create Product</title>
    </Head>

    <div class="bg-white w-full container p-5 mx-auto my-10 shadow-lg">
        <form
            class="mt-6"
            @submit.prevent="form.post('/products')"
            enctype="multipart/form-data"
        >
            <Input name="name" placeholder="Product Name" v-model="form.name">
                Product Name
            </Input>
            <div class="text-red-500" v-if="$page.props.errors.name">
                {{ $page.props.errors.name }}
            </div>
            <div class="my-3 flex justify-between gap-10">
                <div class="my-1 w-full">
                    <label for="image">Product Image</label>

                    <input
                        type="file"
                        class="p-2 w-full placeholder:text-gray-500 mt-2 bg-white border border-slate-400"
                        @input="form.image = $event.target.files[0]"
                    />
                </div>

                <div class="text-red-500" v-if="$page.props.errors.image">
                    {{ $page.props.errors.image }}
                </div>
                <Input
                    name="unit"
                    placeholder="Product Unit"
                    v-model="form.unit"
                    >Product Unit
                </Input>
                <div class="text-red-500" v-if="$page.props.errors.unit">
                    {{ $page.props.errors.unit }}
                </div>
            </div>
            <div class="my3 flex justify-between gap-10">
                <select
                    name="category_id"
                    id="category_id"
                    class="w-full bg-white border border-slate-400 p-2 mt-2"
                    v-model="form.category_id"
                >
                    <option value="" disabled selected>
                        Please Choose Category
                    </option>
                    <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
                <select
                    name="supplier_id"
                    id="supplier_id"
                    class="w-full bg-white border border-slate-400 p-2 mt-2"
                    v-model="form.supplier_id"
                >
                    <option value="" disabled selected>
                        Please Choose Supplier
                    </option>
                    <option v-for="supplier in suppliers" :value="supplier.id">
                        {{ supplier.name }}
                    </option>
                </select>
            </div>
            <div class="my-5">
                <textarea
                    name="description"
                    id="description"
                    placeholder="Description Product"
                    cols="30"
                    rows="10"
                    class="border w-full p-3 border-slate-500 placeholder:text-gray-500"
                    v-model="form.description"
                ></textarea>
            </div>

            <div class="my-5">
                <Link
                    class="py-2.5 px-5 text-sm bg-red-500 text-white mx-2 hover:bg-red-400"
                    href="/products/"
                    ><i class="fa fa-solid fa-xmark"></i> Back</Link
                >
                <Submit></Submit>
            </div>
        </form>
    </div>
</template>
