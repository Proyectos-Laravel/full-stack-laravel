<script>
export default {
    name: 'UserInfo',
}
</script>

<script setup>
defineProps({
    user: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
        {{ user?.name }}
        <small class="text-sm text-gray-400">
            {{ user?.email }}
        </small>
    </h2>
</template>
