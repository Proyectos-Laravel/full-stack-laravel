<script>
export default {
    name: "AppSubmitButton",
}
</script>

<script setup>
defineProps({
    loading: {
        type: Boolean,
        default: false,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
})
</script>

<template>
    <button
        type="submit"
        :disabled="disabled || loading"
        class="px-4 py-2 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm text-center"
    >
        <slot />
    </button>
</template>
