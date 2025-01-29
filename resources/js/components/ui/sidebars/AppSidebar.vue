<script>
export default {
    name: 'AppSidebar',
}
</script>

<script setup>
import {
    AppSidebarHelloUserItem, AppSidebarLinkItem, AppSidebarSeparatorItem,
} from '@/components/ui/sidebars/items';

defineProps({
    sidebarNavItems: {
        type: Array,
        required: true,
    },
})

const sidebarComponents = {
    AppSidebarHelloUserItem,
    AppSidebarLinkItem,
    AppSidebarSeparatorItem,
}
</script>

<template>
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <component
                    v-for="(item, index) in sidebarNavItems"
                    :key="`sidebar-nav-item-${index}`"
                    :is="sidebarComponents[item?.component]"
                    v-bind="item?.props"
                />
            </ul>
        </div>
    </aside>
</template>
