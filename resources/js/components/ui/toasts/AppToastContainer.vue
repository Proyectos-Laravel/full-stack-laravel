<script>
export default {
    name: 'AppToastContainer',
}
</script>

<script setup>
import { inject } from "vue";
import { CheckCircleIcon, ExclamationCircleIcon, InformationCircleIcon, XCircleIcon } from '@heroicons/vue/24/outline'
import AppToast from "@/components/ui/toasts/AppToast.vue"

const icons = {
    success: CheckCircleIcon,
    warning: ExclamationCircleIcon,
    info: InformationCircleIcon,
    error: XCircleIcon,
};

const cssClasses = {
    success: 'text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200',
    warning: 'text-yellow-500 bg-yellow-100 rounded-lg dark:bg-yellow-800 dark:text-yellow-200',
    info: 'text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200',
    error: 'text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200',
};

const toasts = inject('toasts');
const removeToast = inject('removeToast');
</script>

<template>
    <div class="toast-container">
        <AppToast
            v-for="toast in toasts"
            :key="toast.id"
            :toast="toast"
            :iconComponent="icons[toast.type]"
            :cssClasses="cssClasses[toast.type]"
            @removeToast="removeToast"
        />
    </div>
</template>

<style scoped>
.toast-container {
    position: fixed;
    top: 0;
    right: 0;
    padding: 1em;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 1em;
}
</style>
