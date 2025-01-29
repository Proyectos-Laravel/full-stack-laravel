<script>
export default {
    name: 'AppDatatableStatusColumn',
}
</script>

<script setup>
defineProps({
    value: {
        type: String,
    },
    trueValue: {
        type: String,
        default: 'Online',
    },
    falseValue: {
        type: String,
        default: 'Offline',
    },
})
</script>

<template>
    <td class="text-sm font-medium text-white px-6 py-4">
        <span
            :class="{
                'bg-green-200 text-green-800': value === trueValue,
                'bg-red-200 text-red-800': value === falseValue,
            }"
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        >
            {{ value }}
        </span>
    </td>
</template>
