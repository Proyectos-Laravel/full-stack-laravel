<script>
export default {
    name: 'AppStat',
}
</script>

<script setup>
defineProps({
    label: {
        type: String,
        required: true,
    },
    value: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <div
        class="flex flex-col items-center justify-center p-5 m-2 bg-gray-800 rounded-lg shadow dark:bg-gray-900 border border-gray-700 dark:border-gray-600"
    >
        <p class="text-sm font-medium tracking-wide text-gray-400 uppercase dark:text-white">
            {{ label }}
        </p>
        <p class="mt-1 text-3xl font-semibold tracking-tight text-white dark:text-white">
            <span class="inline-block">{{ value }}</span>
        </p>
    </div>
</template>
