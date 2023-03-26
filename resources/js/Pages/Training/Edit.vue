<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Form.vue';

const props = defineProps({
    training: Object,
});

const fields = {
    id: props.training.id,
    name: {
        type: 'text',
        value: props.training.name,
    },
};
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.index')">Back</Link>
        <Form :url="route('trainings.update', training.id)" method="put" action="edit" :fields="fields" />
    </Layout>
</template>

<style scoped lang="scss"></style>
