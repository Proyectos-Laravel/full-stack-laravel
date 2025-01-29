<script>
export default {
    name: 'AppDatatableDateColumn',
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
    <td class="text-sm font-medium text-white px-6 py-4">
        {{ value }}
    </td>
</template>
