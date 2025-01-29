<script>
export default {
    name: 'AppDatatableImageColumn',
}
</script>

<script setup>
defineProps({
    value: {
        type: String,
    },
})
</script>

<template>
    <td class="text-sm font-medium text-white px-6 py-4 w-20">
        <img :src="value" class="w-10 h-10 rounded-full border-2 border-gray-600">
    </td>
</template>
