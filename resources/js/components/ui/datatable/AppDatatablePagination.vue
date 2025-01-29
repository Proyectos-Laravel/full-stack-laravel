<script>
export default {
    name: "AppDatatablePagination",
}
</script>

<script setup>
import { AppDatatablePaginationSummary, AppDatatablePaginationLinks } from "@/components/ui/datatable";

defineProps({
    pagination: {
        type: Object,
    }
})

defineEmits(['paginate'])
</script>

<template>
    <div class="flex items-center justify-between border-t border-gray-200">
        <div class="sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <AppDatatablePaginationSummary
                :from="pagination.meta.from"
                :to="pagination.meta.to"
                :total="pagination.meta.total"
            />

            <AppDatatablePaginationLinks
                :pagination="pagination"
                @paginate="$emit('paginate', $event)"
            />
        </div>
    </div>
</template>
