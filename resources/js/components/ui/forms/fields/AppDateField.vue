<script>
export default {
    name: 'AppDateField',
}
</script>

<script setup>
import { AppFormError } from '@/components/ui/forms/errors';

defineProps({
    label: {
        type: String,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    cssClass: String,
    cssFieldClass: String,
    cssLabelClass: String,
    modelValue: String,
    error: {
        type: String,
        default: null,
    },
})

defineEmits(['update:modelValue'])
</script>

<template>
    <div>
        <label :for="name" :class="cssLabelClass">{{ label }}</label>
        <input
            :id="name"
            :name="name"
            :value="modelValue"
            type="date"
            :class="[cssClass, cssFieldClass]"
            @change="$emit('update:modelValue', $event.target.value)"
        />
        <AppFormError
            v-if="error"
            :error="error"
        />
    </div>
</template>
