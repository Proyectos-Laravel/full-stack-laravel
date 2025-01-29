<script>
export default {
    name: 'AppDatatableBadgeColumn',
}
</script>

<script setup>
defineProps({
    value: {
        type: [String, Number],
    },
})
</script>

<template>
    <td class="text-sm font-medium text-white px-6 py-4">
        <span class="relative inline-block px-3 py-1.5 font-semibold text-green-900 leading-tight">
            <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full"></span>
            <span class="relative">{{ value }}</span>
        </span>
    </td>
</template>
