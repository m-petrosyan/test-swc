<script setup>
import {computed, onMounted} from "vue";
import {useStore} from "vuex";

const store = useStore()
const events = computed(() => store.state.event.events);

onMounted(() => {
    store.dispatch('getEvents')
})
</script>

<template>
    <table>
        <tr v-for="event in events">
            <td class="text-gray-400">
                <router-link :to="{name:'event-page',params:{id: event.id}}">
                    Событие : {{ event.title }}
                </router-link>
            </td>
        </tr>
    </table>
</template>

<style scoped>

</style>
