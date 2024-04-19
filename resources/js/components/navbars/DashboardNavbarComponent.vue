<script setup>
import EventListComponent from "@/events/EventListComponent.vue";
</script>

<template>
    <div class="flex flex-no-wrap">
        <div
            class="w-64 absolute sm:relative bg-gray-800 shadow flex-col justify-between hidden sm:flex min-h-screen">
            <div class="px-8">
                <div class="flex flex-col mt-12">
                    <div class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                        <router-link :to="{name:'event-create'}"
                                     class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="text-sm ml-2">Создать событие</span>
                        </router-link>
                    </div>
                    <div class="flex w-full justify-between text-gray-400  items-center mb-2">
                        <span class="text-sm ml-2">Все события</span>
                    </div>
                    <EventListComponent/>
                </div>
            </div>
        </div>
    </div>
</template>
