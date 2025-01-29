<script>
export default {
    name: "AppErrorState",
}
</script>

<script setup>
import { ExclamationCircleIcon } from "@heroicons/vue/24/solid";

defineProps({
    error: {
        type: String,
        required: true,
    }
})

defineEmits(["refresh"])
</script>

<template>
    <div class="text-center border-2 border-dashed border-red-400 rounded-lg px-7 py-16 text-white">
        <ExclamationCircleIcon class="mx-auto h-12 w-12 text-red-400" aria-hidden="true" />
        <h2 class="mt-2 text-base font-semibold leading-6">Ha ocurrido un error</h2>
        <p class="mt-1 text-sm">{{ error }}</p>

        <div class="mt-6">
            <button
                type="button"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                @click="$emit('refresh')"
            >
                Refrescar
            </button>
        </div>
    </div>
</template>
