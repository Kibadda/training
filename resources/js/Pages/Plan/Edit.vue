<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    plan: Object,
});

const form = useForm({
    id: props.plan.id,
    name: props.plan.name,
});
</script>

<template>
    <Layout title="Plan">
        <Link :href="route('plans.index')">Back</Link>
        <Form @submit.prevent="form.put(route('plans.update', plan.id))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
