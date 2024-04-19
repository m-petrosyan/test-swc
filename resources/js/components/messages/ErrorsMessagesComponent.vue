<script setup>
defineProps({
    errors: {
        type: String,
        required: true
    }
})
</script>

<template>
    <b class="text-red-600"> {{ errors }}</b>
</template>

<style scoped>

</style>
