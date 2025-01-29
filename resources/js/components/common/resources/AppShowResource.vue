<script>
export default {
    name: "AppShowResource",
}
</script>

<script setup>
import useIconLoader from "@/composables/useIconLoader.js";

defineProps({
    model: Object,
    modalData: Object,
});

const { loadIcon } = useIconLoader();
</script>

<template>
    <div class="mt-4 pb-4 rounded-lg shadow-sm ring-1 ring-gray-900/5">
        <h2 class="pt-4 pb-0 ml-4">{{ modalData?.title }}</h2>
        <dl class="flex flex-wrap">
            <div
                v-for="(row, key) in modalData?.extra_data?.resource_detail_config"
                :key="`resource-detail-config-${row.name}-${key}`"
                class="mt-4 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6 dark:border-gray-500"
            >
                <dt class="flex-none w-1/4 h-10 rounded-full bg-gray-900/10 flex items-center justify-center">
                    <component
                        v-if="row.icon"
                        :is="loadIcon(row.icon)"
                        class="w-6 h-6 text-gray-900 dark:text-white"
                    />
                    <span
                        v-else
                        class="text-gray-900 text-sm font-bold dark:text-white"
                    >
                        {{ row.label }}
                    </span>
                </dt>

                <dd class="text-sm font-medium leading-6 p-2 text-gray-900 dark:text-white">
                    {{ row.is_boolean ? (model[row.column_name] ? 'Sí' : 'No') : model[row.column_name] }}
                </dd>
            </div>
        </dl>
    </div>
</template>
