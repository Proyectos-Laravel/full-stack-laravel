<script>
export default {
    name: 'AppFormError',
}
</script>

<script setup>
defineProps({
    error: String,
})
</script>

<template>
    <p class="w-full border border-red-400 text-red-700 px-1 mt-1 text-sm rounded relative">
        {{ error }}
    </p>
</template>
