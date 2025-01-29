<script>
export default {
    name: "AppExporter",
}
</script>

<script setup>
import { inject, ref } from "vue";
import { ArrowDownOnSquareIcon } from "@heroicons/vue/24/outline";
import useAxios from "@/composables/useAxios";
import AppSpinner from "@/components/ui/AppSpinner.vue";

const props = defineProps({
    title: String,
    questionMessage: String,
    textSubmitButton: {
        type: String,
        default: 'Exportar',
    },
    textCancelButton: {
        type: String,
        default: 'Cancelar',
    },
    action: Object,
});

const emit = defineEmits(["close", "processed"]);

const { makeRequest } = useAxios();
const processing = ref(false);
const addSuccessToast = inject('addSuccessToast');
const addErrorToast = inject('addErrorToast');

const processAction = () => {
    processing.value = true;
    makeRequest({
            method: props?.action?.method,
            url: props?.action?.url
        }
    )
        .then(response => {
            addSuccessToast(
                response?.data?.title,
                response?.data?.message,
                response?.data?.timeout,
            );
            setTimeout(() => {
                window.location.href = response?.data?.extra?.url;
            }, response?.data?.timeout);

            emit('processed');
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
        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
            <ArrowDownOnSquareIcon class="h-6 w-6 text-blue-600" aria-hidden="true" />
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
            class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:w-auto"
            @click="processAction"
        >
            {{ textSubmitButton }}
        </button>

        <button
            type="button"
            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:ml-3 sm:mt-0 sm:w-auto"
            @click="$emit('close')"
        >
            {{ textCancelButton }}
        </button>
    </div>
</template>
