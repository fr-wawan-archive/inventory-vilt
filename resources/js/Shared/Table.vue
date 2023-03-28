<template>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium bg-zinc-200">
                            <tr class="text-xs text-center">
                                <th
                                    class="p-3 uppercase text-xs"
                                    v-for="header in headers"
                                >
                                    {{ header }}
                                </th>
                                <th class="p-3 uppercase text-xs">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <slot />
                        </tbody>
                    </table>
                    <slot name="pagination"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    headers: Array,
});
</script>
