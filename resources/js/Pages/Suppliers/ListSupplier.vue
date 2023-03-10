<script setup>
import Sidebar from "../Shared/Sidebar.vue";
import Table from "../Shared/Table.vue";
defineProps({
    suppliers: Object,
});
</script>

<template>
    <Sidebar>
        <Table :headers="['Name', 'Address', 'Phone']">
            <tr v-for="supplier in suppliers" class="border-b">
                <td class="whitespace px-6 py-4">{{ supplier.name }}</td>
                <td class="whitespace px-6 py-4">{{ supplier.address }}</td>
                <td class="whitespace px-6 py-4">{{ supplier.phone }}</td>
            </tr>
        </Table>
    </Sidebar>
</template>
