<script>
export default {
    name: 'AppTable',
}
</script>

<script setup>
import { AppDatatable } from "@/components/ui/datatable";

defineProps({
    columns: {
        type: Array,
        required: true,
    },
    tableData: {
        type: Object,
        required: true,
    },
})

defineEmits(['sort', 'paginate', 'actionDispatched'])
</script>

<template>
    <AppDatatable
        :columns="columns"
        :rows="tableData.data"
        :pagination="{
            meta: tableData.pagination,
        }"
        @sort="$emit('sort', $event)"
        @paginate="$emit('paginate', $event)"
        @actionDispatched="$emit('actionDispatched', {action: $event.type, model: $event.row})"
    />
</template>
