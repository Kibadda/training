<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Form.vue';

const props = defineProps({
    plan: Object,
});

const fields = {
    id: props.plan.id,
    name: {
        type: 'text',
        value: props.plan.name,
    },
};
</script>

<template>
    <Layout title="Plan">
        <Link :href="route('plans.index')">Back</Link>
        <Form :url="route('plans.update', plan.id)" method="put" action="edit" :fields="fields" />
    </Layout>
</template>

<style scoped lang="scss"></style>
