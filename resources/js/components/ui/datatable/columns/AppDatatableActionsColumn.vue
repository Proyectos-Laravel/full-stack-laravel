<script>
export default {
    name: 'AppDatatableActionsColumn',
}
</script>

<script setup>
defineProps({
    actions: {
        type: Array,
        required: true,
    },
})

defineEmits(['actionDispatched'])
</script>

<template>
    <td class="text-sm font-medium text-white px-6 py-4">
        <button
            v-for="(action, index) in actions"
            :key="`table-action-${index}`"
            :class="action.class"
            @click="$emit('actionDispatched', action)"
        >
            {{ action.label }}
        </button>
    </td>
</template>
