<script setup>
import DashboardNavbarComponent from "../components/navbars/DashboardNavbarComponent.vue";
import {computed} from "vue";
import {useStore} from "vuex";

const store = useStore()
const user = computed(() => store.state.user.auth);
</script>

<template>
    <p>Имя пользователя {{ user?.first_name }}</p>
    <div class="flex">
        <DashboardNavbarComponent/>
        <section class="w-1/2 mx-auto mt-10">
            <router-view/>
        </section>
    </div>
</template>

