<script>
export default {
    name: "AppDatatableHead",
}
</script>

<script setup>
import { ChevronDownIcon, ChevronUpIcon } from '@heroicons/vue/20/solid'

defineProps({
    columns: {
        type: Array,
        default: () => [],
    },
})

defineEmits(['sort'])
</script>

<template>
    <thead class="text-xs left text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th
                v-for="(column, index) in columns"
                :key='`column-${index}`'
                class="px-6 py-3"
                @click="$emit('sort', column)"
            >
                <a href="#" class="group inline-flex">
                    {{ column.label }}
                    <span
                        v-if="column.sortable"
                        class="ml-2 -mt-1"
                    >
                        <ChevronUpIcon
                            v-if="column.direction === 'asc'"
                            class="h-5 w-5"
                            aria-hidden="true"
                        />
                        <ChevronDownIcon
                            v-else
                            class="h-5 w-5"
                            aria-hidden="true"
                        />
                    </span>
                </a>
            </th>
        </tr>
    </thead>
</template>

