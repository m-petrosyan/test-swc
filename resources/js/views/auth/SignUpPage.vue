<script setup>
import {useStore} from "vuex";
import {computed, reactive} from "vue";
import {useRouter} from "vue-router";
import ErrorsMessagesComponent from "@/components/messages/ErrorsMessagesComponent.vue";

const store = useStore()
const router = useRouter();

const errors = computed(() => store.state.user.userError);

const form = reactive({
    first_name: '',
    last_name: '',
    login: '',
    password: '',
    re_password: '',
})

const signUp = () => {
    store.dispatch('signUp', form)
        .then(() => router.push({name: 'sign-in'}))
}
</script>

<template>
    <h3 class="text-center font-bold">Sign up</h3>
    <ErrorsMessagesComponent v-if="errors" :errors="errors"/>
    <form class="space-y-6" @submit.prevent='signUp'>
        <div>
            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
            <div class="mt-2">
                <input v-model="form.first_name" id="first_name" type="text" required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
            <div class="mt-2">
                <input v-model="form.last_name" id="last_name" type="text" required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <label for="login" class="block text-sm font-medium leading-6 text-gray-900">Login</label>
            <div class="mt-2">
                <input v-model="form.login" id="login" type="text" required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            </div>
            <div class="mt-2">
                <input v-model="form.password" id="password" type="password"
                       required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="re_password" class="block text-sm font-medium leading-6 text-gray-900">Repeat
                    Password</label>
            </div>
            <div class="mt-2">
                <input v-model="form.re_password" id="re_password" name="password" type="password"
                       autocomplete="current-password" required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sign up
            </button>
        </div>

        <p class="mt-10 text-center text-sm text-gray-500">
            Already registered?
            <RouterLink class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500" :to="{name: 'sign-in'}">
                Sign in
            </RouterLink>
        </p>
    </form>
</template>
