<script>
export default {
    name: 'AppDatatableBooleanColumn',
}
</script>

<script setup>
defineProps({
    column: {
        type: Object,
    },
    value: {
        type: Boolean,
    },
})
</script>

<template>
    <td class="text-sm font-medium text-white px-6 py-4">
        <span
            v-if="value"
            class="py-2 px-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
        >
            {{ column.true_value }}
        </span>
        <span
            v-else
            class="py-2 px-2.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"
        >
            {{ column.false_value }}
        </span>
    </td>
</template>
