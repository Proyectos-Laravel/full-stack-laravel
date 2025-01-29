<script>
export default {
    name: "AppRemoveResource",
}
</script>

<script setup>
import { AppRemover } from "@/components/common";

defineProps({
    model: Object,
    modalData: Object,
});
</script>

<template>
    <AppRemover
        :model="model"
        :title="modalData?.title"
        :question-message="modalData?.question_message"
        :text-submit-button="modalData?.text_submit_button"
        :text-cancel-button="modalData?.text_cancel_button"
    />
</template>
