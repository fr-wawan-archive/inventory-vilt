<template>
    <button
        type="button"
        class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5 bg-red-400 hover:bg-[#81A1C1]"
        @click="openModal"
    >
        Delete
    </button>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                {{ title }}
                            </DialogTitle>
                            <div class="mt-2 flex-auto justify-center">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-16 h-16 flex items-center text-red-500 mx-auto"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                <div class="text-center">
                                    <h2 class="text-xl font-bold py-4">
                                        Are you sure?
                                    </h2>
                                    <p
                                        class="text-sm text-gray-500 px-8"
                                        data-te-modal-dismiss
                                    >
                                        Do you really want to delete this data?
                                        This process cannot be undone
                                    </p>

                                    <div
                                        class="p-3 mt-2 text-center space-x-4 flex justify-center"
                                    >
                                        <button
                                            class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"
                                            @click="closeModal"
                                        >
                                            Cancel
                                        </button>

                                        <button
                                            class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medicoum tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600"
                                            @click="closeModal"
                                        >
                                            <Link :href="href" method="delete"
                                                >Delete</Link
                                            >
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import { useModal } from "momentum-modal";

defineProps({
    title: String,
    href: String,
});

const isOpen = ref(false);

function openModal() {
    isOpen.value = true;
}

function closeModal() {
    isOpen.value = false;
}

defineExpose({
    closeModal,
});
</script>
