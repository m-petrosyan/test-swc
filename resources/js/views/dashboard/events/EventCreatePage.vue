<script setup>
import ErrorsMessagesComponent from "@/components/messages/ErrorsMessagesComponent.vue";
import {useStore} from "vuex";
import {useRouter} from "vue-router";
import {computed, reactive} from "vue";

const store = useStore()
const router = useRouter();

const errors = computed(() => store.state.event.eventError);

const form = reactive({
    title: '',
    description: '',
})

const create = () => {
    store.dispatch('createEvent', form)
        .then(() => {
            store.dispatch('getEvents')
            form.title = form.description = ''
        })
}
</script>

<template>
    <ErrorsMessagesComponent v-if="errors" :errors="errors"/>
    <form @submit.prevent='create'>
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Заголовок
            </label>
            <input v-model="form.title" type="text" id="small-input"
                   class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5 mt-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Текст
            </label>
            <textarea v-model="form.description" type="text" id="large-input"
                      class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
        </div>
        <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Создать
        </button>
    </form>
</template>
