<script>
export default {
    name: "AppEditResource",
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

const form = reactive({
    [props?.model?.pk_name]: props?.model?.[props?.model?.pk_name],
});
const formFields = props?.modalData?.form_fields;

formFields.forEach((field) => {
    form[field.props.name] = props.model?.[field?.props?.name] ?? '';
});
form['_method'] = 'PUT';

const { cssClassFor, errorFor, submit, isSubmitting } = useForm(
    props?.model?.update_action?.url,
    props?.model?.update_action?.method,
    form,
    {
        headers: props?.model?.update_action?.headers || {},
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
            'Error',
            message,
        );
    });
};
</script>

<template>
    <AppForm
        :title="props?.modalData?.title"
        :form="form"
        :form-fields="props?.modalData?.form_fields"
        :css-class-for="cssClassFor"
        :error-for="errorFor"
        :is-submitting="isSubmitting"
        :text-submit-button="props?.modalData?.text_submit_button"
        @submit="submitForm"
    />
</template>
