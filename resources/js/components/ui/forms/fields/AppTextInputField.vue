<script>
export default {
    name: 'AppTextInputField',
}
</script>

<script setup>
import { AppFormError } from '@/components/ui/forms/errors';

defineProps({
    label: String,
    name: String,
    modelValue: {
        type: String,
        default: '',
    },
    placeholder: {
        type: String,
        default: '',
    },
    autofocus: {
        type: Boolean,
        default: false,
    },
    autocomplete: {
        type: String,
        default: 'off',
    },
    readonly: {
        type: Boolean,
        default: false,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    cssClass: String,
    cssLabelClass: String,
    cssFieldClass: String,
    error: {
        type: String,
        default: null,
    }
})

defineEmits(['update:modelValue'])
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
            :id="name"
            :name="name"
            :value="modelValue"
            :placeholder="placeholder"
            :autocomplete="autocomplete"
            :readonly="readonly"
            :disabled="disabled"
            :class="[cssClass, cssFieldClass]"
            @input="$emit('update:modelValue', $event.target.value)"
        />

        <AppFormError
            v-if="error"
            :error="error"
        />
    </div>
</template>
