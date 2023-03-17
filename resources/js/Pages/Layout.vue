<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = computed(() => usePage().props.auth.user);
const flash = computed(() => usePage().props.flash);
</script>

<template>
    <main>
        <header>
            <Link href="/dashboard" :class="{ active: $page.url === '/dashboard' }">Dashboard</Link>
            <div v-if="flash.message" class="flash" :class="{ error: flash.error }">
                {{ flash.message }}
            </div>
            <div class="name pull-right">{{ user.name }}</div>
            <Link href="/logout" method="post" as="button">Logout</Link>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>

<style scoped lang="scss">
header {
    width: 100%;
    height: 3rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    background-color: #171923;

    a,
    button {
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
        padding: 0 1rem;
    }

    .flash {
        color: green;
        padding: 0 1rem;

        &.error {
            color: red;
        }
    }
}

article {
    margin: 1rem;
}
</style>
