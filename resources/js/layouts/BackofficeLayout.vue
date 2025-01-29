<script>
export default {
    name: 'BackofficeLayout',
}
</script>

<script setup>
import { AppSidebar } from '@/components/ui/sidebars'

defineProps({
    title: {
        type: String,
        required: true,
    },
    sidebarNavItems: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <AppSidebar
        :sidebarNavItems="sidebarNavItems"
    />

    <div class="xl:pl-72">
        <main>
            <header
                class="flex items-center justify-between border-b border-white/5 px-4 py-4 sm:px-6 sm:py-6 lg:px-8"
            >
                <h1 class="text-base font-semibold leading-7 text-white">                
                    {{ title }}
                </h1>
            </header>

            <main>
                <div class="mx-auto max-w-full sm:px-6 lg:px-8 py-4">                
                    <slot />
                </div>
            </main>
        </main>
    </div>
</template>
