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
    <Layout title="Plan">
        <Link :href="route('plans.index')">Back</Link>
        <Form :url="route('plans.store')" method="post" action="create" :fields="fields" />
    </Layout>
</template>

<style scoped lang="scss"></style>
