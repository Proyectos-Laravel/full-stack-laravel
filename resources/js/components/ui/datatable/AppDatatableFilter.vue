<script>
export default {
    name: 'AppDatatableFilter',
}
</script>

<script setup>
import { reactive } from 'vue';
import useComponentsLoader from "@/composables/useComponentsLoader.js";

const props = defineProps({
    filters: {
        type: Object,
        default: () => ({
            query: '',
        }),
    },
    fields: {
        type: Array,
        default: () => [],
    },
})

const emit = defineEmits(['filter']);

const filters = reactive(props.filters)

const filter = () => {
    emit('filter', filters);
}

const resetFilters = () => {
    Object.keys(filters).forEach((key) => {
        filters[key] = '';
    });
    filter();
}

const { findComponentByName, components, formFieldsLoader } = useComponentsLoader();
const loadedComponents = components(props.fields, formFieldsLoader);
</script>

<template>
    <div class="flex flex-wrap items-center justify-between mb-4">
        <div class="flex items-center w-full mb-4 space-x-4 sm:mb-0 sm:w-auto">
            <div
                v-for="field in fields"
                :key="`filter-field-${field.props.name}-${field.uuid}`"
            >
                <component
                    :is="findComponentByName(field.component, loadedComponents)"
                    v-bind="field.props"
                    v-model="filters[field.props.name]"
                    @update:modelValue="filter"
                />
            </div>

            <button
                type="button"
                class="inline-flex items-center px-4 py-2 mt-8 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm text-center"
                @click="resetFilters"
            >
                Limpiar filtros
            </button>
        </div>
    </div>
</template>
