<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Form.vue';

const props = defineProps({
    exercise: Object,
});

const fields = {
    id: props.exercise.id,
    name: {
        type: 'text',
        value: props.exercise.name,
    },
};
</script>

<template>
    <Layout title="Exercise">
        <Link :href="route('exercises.index')">Back</Link>
        <Form :url="route('exercises.update', exercise.id)" method="put" action="edit" :fields="fields" />
    </Layout>
</template>

<style scoped lang="scss"></style>
