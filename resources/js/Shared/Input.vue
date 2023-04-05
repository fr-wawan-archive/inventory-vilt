<template>
    <div class="my-2 w-full">
        <label :for="name"><slot /></label>
        <input
            :type="type"
            :name="name"
            :id="name"
            :value="modelValue"
            class="p-2 w-full placeholder:text-gray-500 mt-2 bg-white border border-slate-400"
            :placeholder="placeholder"
            @input="$emit('update:modelValue', $event.target.value)"
        />
    </div>
</template>

<script setup>
const props = defineProps({
    name: {
        type: String,
    },
    type: {
        type: String,
        default: "text",
    },

    placeholder: {
        type: String,
    },
    modelValue: {
        type: String,
    },
});
</script>
