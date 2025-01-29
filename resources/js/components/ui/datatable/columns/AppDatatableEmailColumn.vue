<script>
export default {
    name: 'AppDatatableEmailColumn',
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
    <td class="text-sm font-medium text-white px-6 py-4 underline">
        <a target="_blank" :href="'mailto:' + value">{{ value }}</a>
    </td>
</template>
