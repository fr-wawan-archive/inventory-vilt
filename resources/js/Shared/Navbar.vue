<template>
    <div class="w-full">
        <nav class="bg-white p-5 shadow-sm">
            <div class="flex justify-between mt-1">
                <div class="flex gap-10">
                    <slot name="btn"></slot>
                    <h1></h1>
                </div>
                <ul
                    class="flex text-lg gap-5"
                    v-if="$page.props.auth.user"
                    :class="justify"
                >
                    <Link href="/logout" method="post">Logout</Link>
                </ul>
                <ul v-else class="flex gap-5">
                    <Link href="/" method="post">Login</Link>
                    <Link href="/register" method="post">Register</Link>
                </ul>
            </div>
        </nav>
        <div class="">
            <slot />
        </div>
    </div>
</template>

<script setup>
defineProps({
    justify: {
        type: String,
        default: "justify-between",
    },
});
</script>
