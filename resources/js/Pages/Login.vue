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
        <form @submit.prevent="form.post('/')" autocomplete="off" :class="{ error: form.errors.email || form.errors.password }">
            <input type="email" v-model="form.email" placeholder="email"  autocomplete="off" />
            <input type="password" v-model="form.password" placeholder="password"  autocomplete="off" />
            <button type="submit" :disabled="form.processing">Login</button>
        </form>
    </div>
</template>

<style>
.form-container {
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container form {
    border-radius: 1rem;
    padding: 2rem 4rem;
    background-color: #222938;
    display: flex;
    flex-direction: column;
}
.form-container form.error {
    border: 2px solid #ff2d20;
}
.form-container form.error input {
    border: 2px solid #ff2d20;
}

.form-container form input {
    background-color: white;
    color: #ff2d20;
    padding: .5rem;
    margin: .5rem;
    border-radius: .5rem;
    border: 1px solid grey;
    text-align: center;
    font-weight: bold;
}
.form-container form input::placeholder {
    text-transform: uppercase;
}

.form-container form button {
    border: 2px solid #ff2d20;
    background-color: #ff2d20;
    color: white;
    padding: .5rem;
    border-radius: .5rem;
    text-transform: uppercase;
    font-weight: bold;
    cursor: pointer;
    margin: .5rem;
}

.form-container form button:hover {
    background-color: white;
    color: #ff2d20;
}
</style>
