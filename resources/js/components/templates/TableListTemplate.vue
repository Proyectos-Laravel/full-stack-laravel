<script>
export default {
    name: 'TableListTemplate',
}
</script>

<template>
    <div class="relative">

        <div class="flex justify-end items-center">
            <slot name="topActionButtons"></slot>
        </div>

        <div class="mt-1">
            <slot name="filters"></slot>
        </div>

        <slot name="table"></slot>

        <Teleport to="body">
            <slot name="modals" />
        </Teleport>

    </div>
</template>
