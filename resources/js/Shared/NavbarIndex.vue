<template>
    <div class="w-full">
        <nav class="bg-sky-900 p-5 shadow-sm">
            <div class="flex justify-between mt-1">
                <div class="flex gap-10">
                    <slot name="btn"></slot>
                    <h1></h1>
                </div>
                <ul
                    class="flex text-lg gap-5 justify-between"
                    v-if="$page.props.auth.user"
                >
                    <Link href="/logout" method="post" class="text-white"
                        >Logout</Link
                    >
                </ul>
                <ul v-else class="flex gap-5">
                    <Link href="/login">Login</Link>
                    <Link href="/register">Register</Link>
                </ul>
            </div>
        </nav>
        <div class="">
            <slot />
        </div>
    </div>
</template>

<script setup></script>
