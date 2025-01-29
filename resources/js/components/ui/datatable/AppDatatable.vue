<script>
export default {
    name: "AppDatatable",
}
</script>

<script setup>
import useComponentsLoader from "@/composables/useComponentsLoader.js";
import {
    AppDatatableTable,
    AppDatatableHead,
    AppDatatableBody,
    AppDatatableRow,
    AppDatatableNoData,
    AppDatatablePagination,
} from "@/components/ui/datatable";

const props = defineProps({
    columns: {
        type: Array,
        default: () => [],
    },
    rows: {
        type: Array,
        default: () => [],
    },
    pagination: {
        type: Object,
    }
})

defineEmits(['sort', 'paginate', 'actionDispatched']);

const { findComponentByName, components, columnsLoader } = useComponentsLoader();
const loadedComponents = components(props.columns, columnsLoader);
</script>

<template>
    <div
        class="relative overflow-x-auto"
        v-if="rows.length"
    >
        <AppDatatableTable>
            <AppDatatableHead
                :columns="columns"
                @sort="$emit('sort', $event)"
            />
            <AppDatatableBody>
                <AppDatatableRow
                    v-for="(row, rowIndex) in rows"
                    :key="`table-row-${rowIndex}`"
                >
                    <template v-for="column in columns">
                        <component
                            v-if="!column.actions"
                            :key="`table-column-${column.key}-${rowIndex}`"
                            :is="findComponentByName(column.component, loadedComponents)"
                            :column="column"
                            :value="row[column.key]"
                        />

                        <component
                            v-else
                            :key="`table-action-column-${column.key}-${rowIndex}`"
                            :is="findComponentByName(column.component, loadedComponents)"
                            :actions="column.actions"
                            @actionDispatched="$emit('actionDispatched', { type: $event.event, row })"
                        />
                    </template>
                </AppDatatableRow>
            </AppDatatableBody>
        </AppDatatableTable>

        <AppDatatablePagination
            :pagination="pagination"
            @paginate="$emit('paginate', $event)"
        />
    </div>

    <AppDatatableNoData v-else />
</template>

