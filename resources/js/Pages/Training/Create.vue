<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Form.vue';

const fields = {
    name: {
        type: 'text',
        value: '',
    },
};
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.index')">Back</Link>
        <Form :url="route('trainings.store')" method="post" action="create" :fields="fields" />
    </Layout>
</template>

<style scoped lang="scss"></style>
