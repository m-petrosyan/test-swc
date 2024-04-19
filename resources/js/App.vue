<script setup>
import {onMounted} from "vue";
import {useStore} from "vuex";
import router from "./router";

const store = useStore()

onMounted(() => {
    if (sessionStorage.getItem('token')) {
        store.dispatch('auth').catch(() => router.push({name: 'sign-in'}))
    }
})
</script>

<template>
    <router-view/>
</template>

<style scoped>

</style>
