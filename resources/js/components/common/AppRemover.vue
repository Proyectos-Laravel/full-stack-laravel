<script>
export default {
    name: "AppRemover",
}
</script>

<script setup>
import { inject, ref } from "vue";
import { ExclamationTriangleIcon } from "@heroicons/vue/24/outline";
import useAxios from "@/composables/useAxios";
import AppSpinner from "@/components/ui/AppSpinner.vue";

const props = defineProps({
    model: Object,
    title: String,
    questionMessage: String,
    textSubmitButton: {
        type: String,
        default: 'Eliminar',
    },
    textCancelButton: {
        type: String,
        default: 'Cancelar',
    },
});

const emit = defineEmits(["close", "processed"]);

const { makeRequest } = useAxios();
const processing = ref(false);
const addSuccessToast = inject('addSuccessToast');
const addErrorToast = inject('addErrorToast');

const processAction = () => {
    processing.value = true;
    makeRequest({
        method: props?.model?.delete_action?.method,
        url: props?.model?.delete_action?.url }
    )
        .then(response => {
            addSuccessToast(
                response?.data?.title,
                response?.data?.message,
                response?.data?.timeout,
            );
            emit("processed");
        })
        .catch(({ response }) => {
            addErrorToast(
                response?.data?.title,
                response?.data?.message,
                response?.data?.timeout,
            )
        })
        .finally(() => {
            processing.value = false;
        });
}
</script>

<template>
    <AppSpinner v-if="processing" />

    <div class="sm:flex sm:items-start p-4">

        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <ExclamationTriangleIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
        </div>

        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
            <div class="text-base font-semibold leading-6 text-gray-900 dark:text-white">
                {{ title }}
            </div>
            <div class="mt-2">
                <p class="text-sm text-gray-500 dark:text-gray-400" v-html="questionMessage"></p>
            </div>
        </div>
    </div>
    <div class="sm:ml-12 sm:pb-4 sm:flex sm:pl-4">
        <button
            type="button"
            class="inline-flex w-full justify-center bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2 text-white sm:w-auto"
            @click="processAction"
        >
            {{ textSubmitButton }}
        </button>

        <button
            type="button"
            class="inline-flex w-full justify-center bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-gray-500/50 dark:shadow-lg dark:shadow-gray-800/80 font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2 text-white sm:w-auto"
            @click="$emit('close')"
        >
            {{ textCancelButton }}
        </button>
    </div>
</template>
