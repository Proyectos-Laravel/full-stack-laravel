<script>
export default {
    name: "AppButtonWithHeroIcon",
}
</script>

<script setup>
import useIconLoader from "@/composables/useIconLoader.js";

const props = defineProps({
    button: {
        type: Object,
        required: true,
    },
})

defineEmits(["clicked"])

const { loadIcon } = useIconLoader()
</script>

<template>
    <button
        :class="button?.class"
        @click="$emit('clicked', button.action)"
    >
        <component :is="loadIcon(button?.icon)" class="w-5 h-5" />
        {{ button.label }}
    </button>
</template>
