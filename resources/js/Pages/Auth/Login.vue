<template>
    <div class="w-3/12 mx-auto mt-10 p-12 bg-white rounded-xl shadow-md">
        <div>
            <h2 class="text-2xl font-bold">Login User</h2>
            <p class="border-b my-3"></p>
        </div>
        <form @submit.prevent="form.post('/')">
            <Input
                name="email"
                type="email"
                placeholder="Your Email"
                v-model="form.email"
            >
                Email
            </Input>

            <div class="text-red-500" v-if="$page.props.errors.email">
                {{ $page.props.errors.email }}
            </div>
            <Input
                name="password"
                type="password"
                placeholder="Your Password"
                v-model="form.password"
            >
                Password
            </Input>

            <div class="text-red-500" v-if="$page.props.errors.password">
                {{ $page.props.errors.password }}
            </div>

            <div class="mt-5">
                <Submit></Submit>
            </div>

            <div class="mt-10 text-center">
                Dont have any account?
                <Link href="register/" class="underline text-gray-500"
                    >Click Here!</Link
                >
            </div>
        </form>
    </div>
</template>

<script>
import Navbar from "../../Shared/Navbar.vue";

export default {
    layout: Navbar,
};
</script>

<script setup>
import { useForm } from "@inertiajs/vue3";
import Input from "../../Shared/Input.vue";
import Submit from "../../Shared/Submit.vue";

const props = defineProps({});

const form = useForm({
    email: "",
    password: "",
});
</script>
