<script setup>
import {computed, onMounted, watch} from "vue";
import {useStore} from "vuex";
import {useRoute} from "vue-router";
import router from "../../../router";

const store = useStore()
const event = computed(() => store.state.event.event);
const route = useRoute();

onMounted(() => {
    getEvent(route.params.id)
    setInterval(() => getEvent(route.params.id), 30000)
})

watch(() => route.path, (newPath, oldPath) => {
    if (route.params.id) {
        getEvent(route.params.id)
    }
});

const getEvent = (id) => {
    store.dispatch('getEvent', id)
}
const joinToggleEvent = (join) => {
    store.dispatch(join ? 'joinEvent' : 'cancelJoinEvent', route.params.id)
        .then(() => getEvent(route.params.id))
}

const deleteEvent = (join) => {
    store.dispatch('deleteEvent', route.params.id)
        .then(() => {
            store.dispatch('getEvents')
                .then(() => router.push({name: 'dashboard'}))
        })
}

</script>

<template>
    <div v-if="event">
        <div>
            <h3>Название {{ event.title }}</h3>
            <h3>Описание {{ event.description }}</h3>
            <h3>Дата {{ event.date }}</h3>
        </div>
        <div class="mt-10">
            <h3>Участники</h3>
            <table v-if="event.participants.length">
                <tr v-for="participants in event.participants">
                    <td>
                        {{ participants.first_name }}
                    </td>
                </tr>
            </table>
            <h3 v-else>Нет участников</h3>
        </div>
        <div>
            <div v-if="!event.owner ">
                <button v-if="!event.joined" @click="joinToggleEvent(true)"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Принять участие
                </button>
                <button v-else @click="joinToggleEvent(false)"
                        class="flex w-full justify-center rounded-md bg-orange-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Отмена участия
                </button>
            </div>
            <div v-else>
                <button @click="deleteEvent"
                        class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Удалить собитие
                </button>
            </div>
        </div>
    </div>
</template>
