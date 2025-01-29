<script>
export default {
    name: "AppDatatablePaginationSummary",
}
</script>

<script setup>
defineProps({
    from: Number,
    to: Number,
    total: Number,
})
</script>

<template>
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
        Mostrando de {{ ' ' }}
        <span class="font-semibold text-gray-900 dark:text-white">
            {{ from }}{{ ' ' }}a{{ ' ' }}{{ to }}
        </span>
        de
        <span class="font-semibold text-gray-900 dark:text-white">
            {{ total }}{{ ' ' }} registros
        </span>
    </span>
</template>
