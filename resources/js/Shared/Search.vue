<template>
    <div class="flex mx-5 mt-2 justify-between">
        <h1 class="text-xl mt-1 font-bold"><slot /></h1>

        <input
            type="text"
            placeholder="Search.."
            class="p-2 border border-black"
            @input="$emit('update:modelValue', $event.target.value)"
        />
    </div>
</template>

<script setup>
const props = defineProps({
    modelValue: {
        type: String,
    },
});
</script>
