<script>
export default {
    name: 'AppToastProvider',
}
</script>

<script setup>
import useToast from '@/composables/useToast';
import AppToastContainer from "@/components/ui/toasts/AppToastContainer.vue";

useToast();
</script>

<template>
    <div>
        <AppToastContainer />
        <slot />
    </div>
</template>
