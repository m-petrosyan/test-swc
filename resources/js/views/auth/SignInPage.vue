<script setup>
import {useStore} from "vuex";
import {computed, reactive} from "vue";
import {useRouter} from "vue-router";
import ErrorsMessagesComponent from "@/components/messages/ErrorsMessagesComponent.vue";

const store = useStore()
const router = useRouter();

const errors = computed(() => store.state.user.userError);

const form = reactive({
    login: '',
    password: '',
})

const signIn = () => {
    store.dispatch('signIn', form)
        .then(() => {
            store.dispatch('auth').then(() => router.push({name: 'dashboard'}))
        })
}
</script>

<template>
    <h3 class="text-center font-bold">Sign in</h3>
    <ErrorsMessagesComponent v-if="errors" :errors="errors"/>
    <form class="space-y-6" @submit.prevent='signIn'>
        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Login</label>
            <div class="mt-2">
                <input v-model="form.login" id="login" name="login" type="text" autocomplete="login" required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            </div>
            <div class="mt-2">
                <input v-model="form.password" id="password" name="password" type="password"
                       autocomplete="current-password" required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sign in
            </button>
        </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
        Not a member?
        <RouterLink class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500" :to="{name: 'sign-up'}">
            Sign up
        </RouterLink>
    </p>
</template>

