<script>
export default {
    name: "AppEmptyState",
}
</script>

<script setup>
import { ExclamationCircleIcon } from "@heroicons/vue/24/solid";

defineProps({
    title: {
        type: String,
        default: "No hay datos",
    },
    message: {
        type: String,
        default: "No se encontraron datos para mostrar.",
    },
})
</script>

<template>
    <div class="w-full text-center border-2 border-dashed border-gray-400 rounded-lg px-7 py-16 text-white">
        <ExclamationCircleIcon class="mx-auto h-12 w-12 text-dark" aria-hidden="true" />
        <h2 class="mt-2 text-base font-semibold leading-6">{{ title }}</h2>
        <p class="mt-1 text-sm">{{ message }}</p>
    </div>
</template>
