<script>
export default {
    name: 'AppSelectField',
}
</script>

<script setup>
import { AppFormError } from '@/components/ui/forms/errors';

defineProps({
    label: String,
    name: String,
    placeholder: String,
    disabled: {
        type: Boolean,
        default: false,
    },
    options: {
        type: Array,
        default: () => [],
    },
    modelValue: [Number, String],
    cssClass: String,
    cssLabelClass: String,
    cssFieldClass: String,
    error: {
        type: String,
        default: null,
    },
})

defineEmits(['update:modelValue'])
</script>

<template>
    <div>
        <label
            :for="name"
            :class="cssLabelClass"
        >
            {{ label }}
        </label>

        <select
            :id="name"
            :name="name"
            :value="modelValue"
            :class="[cssClass, cssFieldClass]"
            :disabled="disabled"
            @change="$emit('update:modelValue', $event.target.value)"
        >
            <option v-if="!modelValue" value="">{{ placeholder }}</option>
            <option
                v-for="option in options"
                :key="option.value"
                :value="option.value"
            >
                {{ option.text }}
            </option>
        </select>

        <AppFormError
            v-if="error"
            :error="error"
        />
    </div>
</template>
