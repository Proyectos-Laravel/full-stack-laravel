<script>
export default {
    name: 'AppSidebarLinkItem',
}
</script>

<script setup>
import useIconLoader from "@/composables/useIconLoader.js";

defineProps({
    text: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        required: true,
    },
    iconComponent: {
        type: String,
        required: true,
    },
    current: {
        type: Boolean,
        required: true,
    },
})

const { loadIcon } = useIconLoader();
</script>

<template>
    <li class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <a
            :href="href"
            :class="[current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']"
        >
            <component
                :is="loadIcon(iconComponent)"
                class="h-6 w-6 shrink-0"
                aria-hidden="true"
            />
            {{ text }}
        </a>
    </li>
</template>
