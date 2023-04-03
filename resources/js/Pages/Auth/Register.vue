<template>
    <div class="w-4/12 mx-auto mt-10 p-12 bg-white rounded-xl shadow-md">
        <div>
            <h2 class="text-2xl font-bold">Registration</h2>
            <p class="border-b my-3"></p>
        </div>
        <form
            @submit.prevent="
                form.post('/register', {
                    onError: () =>
                        form.reset('password', 'password_confirmation'),
                })
            "
        >
            <Input name="name" placeholder="Your Username" v-model="form.name">
                Username
            </Input>

            <div class="text-red-500" v-if="$page.props.errors.name">
                {{ $page.props.errors.name }}
            </div>
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
            <div class="flex gap-3">
                <div class="w-11/12">
                    <Input
                        name="password"
                        type="password"
                        placeholder="Your Password"
                        v-model="form.password"
                    >
                        Password
                    </Input>

                    <div
                        class="text-red-500"
                        v-if="$page.props.errors.password"
                    >
                        {{ $page.props.errors.password }}
                    </div>
                </div>

                <div class="w-full">
                    <Input
                        name="password_confirmation"
                        type="password"
                        placeholder="Password Confirmation"
                        v-model="form.password_confirmation"
                    >
                        Confirm Password
                    </Input>

                    <div
                        class="text-red-500"
                        v-if="$page.props.errors.password"
                    >
                        {{ $page.props.errors.password }}
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <Submit></Submit>
            </div>

            <div class="mt-10 text-center">
                Already have an account?
                <Link href="/" class="underline text-gray-500"
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
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});
</script>
