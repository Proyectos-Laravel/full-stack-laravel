<script>
export default {
    name: "AppCreateResource",
}
</script>

<script setup>
import { reactive, inject } from "vue";
import useForm from "@/composables/useForm.js";
import { AppForm } from "@/components/common";

const props = defineProps({
    model: Object,
    modalData: Object,
});

const emit = defineEmits(["processed", "close"]);

const addSuccessToast = inject("addSuccessToast");
const addErrorToast = inject("addErrorToast");

const form = reactive({});
const formFields = props?.modalData?.form_fields;

formFields.forEach((field) => {
    if (typeof field.props?.defaultValue !== "undefined")
    {
        form[field.name] = field.props?.defaultValue;
        return;
    }

    form[field.name] = props.model?.[field.name] || "";
});

const { cssClassFor, errorFor, submit, isSubmitting } = useForm(
    props?.modalData?.action?.url,
    props?.modalData?.action?.method,
    form,
    {
        headers: props?.modalData?.action?.headers || {},
    }
);

const submitForm = () => {
    submit((response) => {
        addSuccessToast(
            response?.title,
            response?.message,
            response?.timeout,
        );

        emit("processed");
    }, (message) => {
        addErrorToast(
            "Error",
            message,
        );
    });
};
</script>

<template>
    <AppForm
        :title="modalData?.title"
        :form="form"
        :form-fields="modalData?.form_fields"
        :css-class-for="cssClassFor"
        :error-for="errorFor"
        :is-submitting="isSubmitting"
        :text-submit-button="modalData?.text_submit_button"
        @submit="submitForm"
    />
</template>
