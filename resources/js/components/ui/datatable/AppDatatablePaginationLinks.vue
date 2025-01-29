<script>
export default {
    name: "AppDatatablePaginationLinks",
}
</script>

<script setup>
import { ChevronLeftIcon, ChevronDoubleLeftIcon, ChevronRightIcon, ChevronDoubleRightIcon } from '@heroicons/vue/20/solid'
import AppDatatablePaginationLink from "./AppDatatablePaginationLink.vue";
import AppDatatablePaginationCurrent from "./AppDatatablePaginationCurrent.vue";

defineProps({
    pagination: {
        type: Object,
    }
})

defineEmits(['paginate'])
</script>

<template>
    <nav
        class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Pagination"
    >
        <template
            v-for="link in pagination.meta.links"
            :key="link.label"
            class="m-1"
        >
            <AppDatatablePaginationLink
                v-if="link.label === 'first'"
                @click.prevent="$emit('paginate', 1)"
            >
                <ChevronDoubleLeftIcon class="h-5 w-5" aria-hidden="true" />
            </AppDatatablePaginationLink>

            <AppDatatablePaginationLink
                v-if="link.label === 'prev'"
                @click.prevent="$emit('paginate', pagination.meta.current_page - 1)"
            >
                <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
            </AppDatatablePaginationLink>

            <template v-if="!isNaN(link.label)">
                <AppDatatablePaginationLink
                    v-if="pagination.meta.current_page !== link.label"
                    @click.prevent="$emit('paginate', link.label)"
                >
                    {{ link.label }}
                </AppDatatablePaginationLink>

                <AppDatatablePaginationCurrent v-else>
                    {{ link.label }}
                </AppDatatablePaginationCurrent>
            </template>

            <AppDatatablePaginationLink
                v-if="link.label === 'next'"
                @click.prevent="$emit('paginate', pagination.meta.current_page + 1)"
            >
                <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
            </AppDatatablePaginationLink>

            <AppDatatablePaginationLink
                v-if="link.label === 'last'"
                @click.prevent="$emit('paginate', pagination.meta.last_page)"
            >
                <ChevronDoubleRightIcon class="h-5 w-5" aria-hidden="true" />
            </AppDatatablePaginationLink>
        </template>
    </nav>
</template>
