<script>
export default {
    name: "AppForm",
}
</script>

<script setup>
import useComponentsLoader from "@/composables/useComponentsLoader.js";
import { FormTemplate } from '@/components/templates';
import { AppSpinner } from '@/components/ui';

const props = defineProps({
    title: {
        type: String,
    },
    form: {
        type: Object,
        default: () => ({}),
    },
    formFields: {
        type: Array,
        default: () => [],
    },
    isSubmitting: {
        type: Boolean,
        default: false,
    },
    cssClassFor: {
        type: Function,
    },
    errorFor: {
        type: Function,
    },
    textSubmitButton: {
        type: String,
        default: "Enviar",
    },
})

defineEmits(["submit"])

const { findComponentByName, components, formFieldsLoader } = useComponentsLoader()
const loadedComponents = components(props.formFields, formFieldsLoader)
</script>

<template>
    <AppSpinner v-if="isSubmitting" />
    <FormTemplate
        :title="title"
        :loading="isSubmitting"
        :text-submit-button="textSubmitButton"
        @submit="$emit('submit', form)"
    >
        <div v-for="field in formFields"  class="mb-2">
            <component
                :is="findComponentByName(field.component, loadedComponents)"
                :key="field.uuid"
                v-bind="field.props"
                :css-class="cssClassFor(field.props.name)"
                :error="errorFor(field.props.name)"
                :model-value="form[field.props.name]"
                @update:model-value="form[field.props.name] = $event"
            />
        </div>
    </FormTemplate>
</template>
