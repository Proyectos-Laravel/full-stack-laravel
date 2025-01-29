<script>
export default {
    name: "StatsTemplate",
}
</script>

<template>
    <div class="bg-gray-900">
        <div class="mx-auto max-w-full px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-2 lg:grid-cols-4 px-4 py-6 sm:px-6">
                <slot />
            </div>
        </div>
    </div>
</template>
