<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3';

const user = computed(() => usePage().props.auth.user);
const flash = computed(() => usePage().props.flash);
</script>

<template>
    <main>
        <header>
            <Link href="/dashboard" :class="{ active: $page.url === '/dashboard' }">Dashboard</Link>
            <div class="name pull-right">{{ user.name }}</div>
            <Link href="/logout" method="post" as="button">Logout</Link>
        </header>
        <article>
            <div v-if="flash.message" class="flash" :class="{ error: flash.error }">
                {{ flash.message }}
            </div>
            <slot />
        </article>
    </main>
</template>

<style>
header {
    width: 100%;
    height: 3rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    background-color: #171923;
}

header a,
header button {
    border: none;
    background-color: #171923;
    height: 100%;
    line-height: 3rem;
    text-align: center;
    padding: 0 1rem;
    text-decoration: none;
    color: #ff2d20;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
}

header div.name {
    color: white;
    padding: 0 1rem;
}

header .pull-right {
    margin-left: auto;
}

header a.active {
    text-decoration: underline;
}

header a:hover,
header button:hover {
    background-color: #ff2d20;
    color: white;
    text-decoration: none;
}

article {
    margin: 1rem;
}

article div.flash {
    border-radius: .5rem;
    border: 2px solid green;
    background-color: lightgreen;
    color: green;
    padding: 1rem;
}
article div.flash.error {
    border-color: red;
    color: red;
    background-color: #f08080;
}
</style>
