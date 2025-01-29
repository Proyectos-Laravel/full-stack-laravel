<script>
export default {
    name: 'AppImageField',
}
</script>

<script setup>
import useFormWithFile from '@/composables/useFormWithFile'
import {AppFormError} from '@/components/ui/forms/errors'

defineProps({
    label: {
        type: String,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    accept: {
        type: String,
        default: 'image/png,image/jpeg',
    },
    help: {
        type: String,
        default: 'Archivo PNG o JPG hasta 10MB',
    },
    modelValue: {
        type: [Object, String],
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    cssClass: String,
    cssFieldClass: String,
    cssLabelClass: String,
    cssHelpClass: String,
    error: {
        type: String,
        default: null,
    }
})

const emit = defineEmits(['update:modelValue'])

const {selectedFile, onFileChange} = useFormWithFile()

const onSelectedFile = e => {
    onFileChange(e)
    emit('update:modelValue', selectedFile.value)
}
</script>

<template>
    <label
        :for="name"
        :class="cssLabelClass"
    >
        {{ label }}
    </label>

    <div class="mt-1 relative rounded-md shadow-sm">
        <input
            type="file"
            :id="name"
            :name="name"
            :accept="accept"
            :disabled="disabled"
            :class="[cssClass, cssFieldClass]"
            @change="onSelectedFile"
        />

        <div :class="cssHelpClass">
            {{ help }}
        </div>

        <AppFormError
            v-if="error"
            :error="error"
        />
    </div>
</template>
