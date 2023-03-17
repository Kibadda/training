<script setup>
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object,
});

const form = useForm({
    email: null,
    password: null,
});
</script>

<template>
    <Head title="Login" />
    <div class="form-container">
        <form @submit.prevent="form.post('/')" :class="{ error: form.errors.email || form.errors.password }">
            <input type="email" v-model="form.email" placeholder="email" />
            <input type="password" v-model="form.password" placeholder="password" />
            <button type="submit" :disabled="form.processing">Login</button>
        </form>
    </div>
</template>

<style scoped lang="scss">
div {
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;

    form {
        border-radius: 1rem;
        padding: 2rem 4rem;
        background-color: #222938;
        display: flex;
        flex-direction: column;

        &.error {
            border: 2px solid #ff2d20;

            input {
                border: 2px solid #ff2d20;
            }
        }

        input {
            background-color: white;
            color: #ff2d20;
            padding: .5rem;
            margin: .5rem;
            border-radius: .5rem;
            border: 1px solid grey;
            text-align: center;
            font-weight: bold;

            &::placeholder {
                text-transform: uppercase;
            }
        }

        button {
            border: 2px solid #ff2d20;
            background-color: #ff2d20;
            color: white;
            padding: .5rem;
            border-radius: .5rem;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            margin: .5rem;

            &:hover {
                background-color: white;
                color: #ff2d20;
            }
        }
    }
}
</style>
