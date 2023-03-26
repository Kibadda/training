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
    <Layout title="Exercise">
        <Link :href="route('exercises.index')">Back</Link>
        <Form :url="route('exercises.store')" method="post" action="create" :fields="fields" />
    </Layout>
</template>

<style scoped lang="scss"></style>
