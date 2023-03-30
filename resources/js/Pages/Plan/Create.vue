<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Submit from '../Components/Submit.vue';

const form = useForm({
    name: '',
});
</script>

<template>
    <Layout title="Plan">
        <Link :href="route('plans.index')">Back</Link>
        <Form @submit.prevent="form.post(route('plans.store'))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
