<script setup>
import { computed } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const user = computed(() => usePage().props.auth.user);
const flash = computed(() => usePage().props.flash);

defineProps({
    title: String,
});
</script>

<template>
    <nav>
        <div class="name">{{ user.name }}</div>

        <Link :href="route('dashboard')" :class="{ active: $page.url.startsWith('/dashboard') }">Dashboard</Link>
        <Link :href="route('exercises.index')" :class="{ active: $page.url.startsWith('/exercises') }">Exercise</Link>
        <Link :href="route('trainings.index')" :class="{ active: $page.url.startsWith('/trainings') }">Training</Link>
        <Link :href="route('plans.index')" :class="{ active: $page.url.startsWith('/plans') }">Plan</Link>

        <div v-if="flash.success" class="flash success">
            {{ flash.success }}
        </div>
        <div v-if="flash.error" class="flash error">
            {{ flash.error }}
        </div>

        <Link :href="route('logout')" :class="{ 'pull-down': !flash.success && !flash.error }" method="post" as="button">
        Logout</Link>
    </nav>
    <main>

        <Head :title="title" />
        <div class="block">
            <slot />
        </div>
    </main>
</template>

<style scoped lang="scss">
nav {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 15vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    background-color: #171923;

    a,
    button {
        border: none;
        background-color: #171923;
        width: 100%;
        text-align: start;
        font-size: 1rem;
        padding: 1rem;
        text-decoration: none;
        color: #ff2d20;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;

        &:hover {
            background-color: #ff2d20;
            color: white;
        }

        &.active {
            text-decoration: underline;
        }
    }

    .name {
        color: white;
        padding: 1rem;
        font-weight: bold;
        cursor: default;
    }

    .flash {
        margin-top: auto;
        padding: 1rem;

        &.success {
            background-color: green;
            color: #171923;
        }

        &.error {
            background-color: red;
            color: #171923;
        }
    }
}

main {
    width: 100%;
    height: 100%;
    padding: 5vh 3vw 5vh 18vw;

    div.block {
        border: 2px solid #555555;
        border-radius: .5rem;
        width: 100%;
        height: 100%;
        padding: 1rem;
        background-color: #434343;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        overflow-x: hidden;
        overflow-y: auto;
    }
}
</style>

<style j lang="scss">
.block {

    a,
    button {
        border: none;
        background-color: #434343;
        text-align: center;
        padding: .25rem;
        text-decoration: none;
        color: green;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 1rem;
        cursor: pointer;
        border-radius: .5rem;
        border: 1px solid green;

        &.fixed {
            position: fixed;
        }
    }
}
</style>
