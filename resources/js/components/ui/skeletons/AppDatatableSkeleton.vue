<script>
export default {
    name: "AppDatatableSkeleton",
}
</script>

<script setup>
defineProps({
    columns: {
        type: Array,
        default: () => [],
    },
    rows: {
        type: Number,
        default: 5,
    },
})
</script>

<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    v-for="(column, index) in columns"
                                    :key='`skeleton-column-${index}`'
                                    scope="col"
                                    class="py-6 pl-4 pr-3 whitespace-nowrap"
                                >
                                    <div class="w-3/4 h-6 bg-gray-300 rounded"></div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr
                                v-for="row in rows"
                                :key="`skeleton-row-${row}`"
                            >
                                <td
                                    v-for="(column, index) in columns"
                                    :key='`column-row-${index}`'
                                    class="py-4 pl-4 pr-3 whitespace-nowrap"
                                >
                                    <div class="w-3/4 h-4 bg-gray-300 rounded"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
