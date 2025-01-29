<script>
export default {
    name: 'AppDatatableNoData',
}
</script>

<script setup>
import { AppEmptyState } from '@/components/ui/states'
</script>

<template>
    <AppEmptyState
        title="No hay datos que mostrar"
        message="No se encontraron datos para mostrar en este listado"
    />
</template>
