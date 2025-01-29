<script>
export default {
    name: "AppExportResource",
}
</script>

<script setup>
import { AppExporter } from "@/components/common";

defineProps({
    model: {
        type: Object,
        default: () => ({}),
    },
    modalData: Object,
});

defineEmits(['close', 'processed']);
</script>

<template>
    <AppExporter
        :title="modalData?.title"
        :question-message="modalData?.question_message"
        :text-submit-button="modalData?.text_submit_button"
        :text-cancel-button="modalData?.text_cancel_button"
        :action="modalData?.action"
        @processed="$emit('processed')"
        @close="$emit('close')"
    />
</template>
