import { ref } from "vue";
import useAxios from "@/composables/useAxios";

export default function (
    submitUrl,
    submitMethod,
    formData,
    headers = { headers: { "Content-Type": "application/json" }}
) {
    const submitted = ref(false);
    const isSubmitting = ref(false);
    const errors = ref({});

    const errorFor = field => errors.value[field] ? errors.value[field][0] : null;

    const hasError = field => !!errorFor(field);

    const cssClassFor = field => {
        if (submitted.value) {
            if (hasError(field)) {
                if (field.endsWith('_id')) {
                    return 'border-red-500 dark:border-red-500';
                }
                return 'border-red-500 bg-red-100 dark:border-red-500 dark:bg-red-500';
            }
        }
        return ''
    }

    const submit = async (success, error) => {
        errors.value = {};
        try {
            const { makeRequest } = useAxios();
            const { data } = await makeRequest({
                method: submitMethod,
                url: submitUrl,
                data: formData,
                headers,
            });
            success(data);
        } catch (e) {
            if (e.response) {
                if (e.response.status === 422) {
                    errors.value = e.response.data.errors;
                } else {
                    error(e.response.data.message, e.response.status);
                }
            }
        } finally {
            submitted.value = true;
            isSubmitting.value = false;
        }
    }

    return {
        isSubmitting,
        cssClassFor,
        errorFor,
        submit,
    }
}
