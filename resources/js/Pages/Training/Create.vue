<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Select from '../Components/Select.vue';
import Submit from '../Components/Submit.vue';

const form = useForm({
    name: '',
});
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.index')" class="fixed">Back</Link>
        <Form @submit.prevent="form.post(route('trainings.store'))">
            <Input v-model="form.name" label="Name" :error="form.errors.name" />
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
