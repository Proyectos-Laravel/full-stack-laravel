<script>
export default {
    name: 'FormTemplate',
}
</script>

<script setup>
import { AppSubmitButton } from '@/components/ui/forms/buttons';

defineProps({
    title: {
        type: String,
    },
    loading: {
        type: Boolean,
        default: false,
    },
    textSubmitButton: {
        type: String,
        default: 'Guardar',
    },
})

defineEmits(['submit'])
</script>

<template>
    <div class="p-4">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-white dark:border-gray-500 border-b border-gray-200 pb-2">
            {{ title }}
        </h2>
        <form>
            <slot />
            <div class="d-flex justify-content-end mt-3 mb-0 g-0">
                <slot name="buttons">
                    <AppSubmitButton
                        :loading="loading"
                        @click.prevent="$emit('submit')"
                    >
                        {{ textSubmitButton }}
                    </AppSubmitButton>
                </slot>
            </div>
        </form>
    </div>
</template>
