<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    exercise: Object,
});

const form = useForm({
    id: props.exercise.id,
    name: props.exercise.name,
});
</script>

<template>
    <Layout title="Exercise">
        <Link :href="route('exercises.index')">Back</Link>
        <Form @submit.prevent="form.put(route('exercises.update', exercise.id))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
