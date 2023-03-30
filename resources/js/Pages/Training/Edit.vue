<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Select from '../Components/Select.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    training: Object,
});

const form = useForm({
    id: props.training.id,
    name: props.training.name,
});
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.index')" class="fixed">Back</Link>
        <Form @submit.prevent="form.put(route('trainings.update', training.id))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
