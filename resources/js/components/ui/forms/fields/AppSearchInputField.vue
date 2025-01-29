<script>
export default {
    name: 'AppSearchInputField',
}
</script>

<script setup>
import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
    name: {
        type: String,
        default: 'search',
    },
    label: {
        type: String,
        default: '',
    },
    placeholder: {
        type: String,
        default: 'Buscador',
    },
    modelValue: {
        type: String,
        default: '',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    cssFieldClass: String,
})

const emit = defineEmits(['update:modelValue'])

const updateSearch = e => {
    emit('update:modelValue', e.target.value)
}

const clearIfEmpty = e => {
    if (e.target.value === '') {
        emit('update:modelValue', '')
    }
}
</script>

<template>
    <label
        :for="name"
        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
    >
        {{ label }}
    </label>

    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <MagnifyingGlassIcon
                class="pointer-events-none absolute inset-y-0 left-2 h-full w-5 text-gray-500"
                aria-hidden="true"
            />
        </div>

        <input
            type="search"
            :id="name"
            autocomplete="off"
            :class="cssFieldClass"
            :placeholder="placeholder"
            :value="modelValue"
            @change="updateSearch"
            @input="clearIfEmpty"
        />
    </div>
</template>
