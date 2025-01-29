<script>
export default {
    name: 'AppSidebarHelloUserItem',
    
}
</script>

<script setup>
defineProps({
    text: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <li class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <span class="flex-1 h-px bg-gray-300 dark:bg-gray-700" aria-hidden="true"></span>
        <span class="px-2 text-sm text-gray-500 dark:text-gray-400">{{ text }}</span>
        <span class="flex-1 h-px bg-gray-300 dark:bg-gray-700" aria-hidden="true"></span>
    </li>
</template>
