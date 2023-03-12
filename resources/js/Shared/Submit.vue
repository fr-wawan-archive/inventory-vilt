<template>
    <button
        type="submit"
        class="text-white bg-[#2E3440] hover:bg-[#434C5E] py-2 px-4 text-sm"
        @click="submitForm"
    >
        <i class="fa text-sm fa-light fa-check"></i> Submit
    </button>
</template>

<script>
export default {
    methods: {
        submitForm() {
            this.$emit("form-submitted");
        },
    },
};
</script>
