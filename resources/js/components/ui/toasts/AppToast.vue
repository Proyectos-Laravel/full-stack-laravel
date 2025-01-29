<script>
export default {
    name: 'AppToast',
}
</script>

<script setup>
defineProps({
    toast: Object,
    iconComponent: Function,
    cssClasses: String,
})

defineEmits(['removeToast'])
</script>

<template>
    <div
        aria-live="assertive"
        class="pointer-events-none inset-0 flex items-end px-4 sm:items-start"
        style="min-width: 25em;"
    >
        <div class="flex w-full flex-col items-center sm:items-end">
            <div
                class="pointer-events-auto w-full max-w-sm overflow-hidden bg-white rounded-lg dark:text-gray-400 dark:bg-gray-800 shadow ring-1 ring-black ring-opacity-5"
            >
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <component
                                :is="iconComponent"
                                class="h-6 w-6"
                                :class="cssClasses"
                                aria-hidden="true"
                            />
                        </div>

                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ toast.title }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ toast.message }}</p>
                        </div>

                        <button
                            @click="$emit('removeToast', toast.id)"
                            type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                            aria-label="Close"
                        >
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
