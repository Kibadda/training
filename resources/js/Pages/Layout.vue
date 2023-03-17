<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = computed(() => usePage().props.auth.user);
const flash = computed(() => usePage().props.flash);
</script>

<template>
    <main>
        <header>
            <Link href="/dashboard" :class="{ active: $page.url.startsWith('/dashboard') }">Dashboard</Link>
            <Link href="/exercises" :class="{ active: $page.url.startsWith('/exercise') }">Exercise</Link>

            <div v-if="flash.success" class="flash success">
                {{ flash.success }}
            </div>
            <div v-if="flash.error" class="flash error">
                {{ flash.error }}
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
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
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
        padding: 0 1rem;

        &.success {
            color: green;
        }

        &.error {
            color: red;
        }
    }
}

article {
    margin: 4rem 10vw 0 10vw;
}
</style>
