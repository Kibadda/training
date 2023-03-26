<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';

defineProps({
    trainings: Array,
});
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.create')">Add</Link>
        <table class="data">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="training in trainings">
                    <td>{{ training.name }}</td>
                    <td>{{ training.created_at }}</td>
                    <td>{{ training.updated_at }}</td>
                    <td>
                        <Link :href="route('trainings.edit', training.id)">Edit</Link>
                        <Link :href="route('trainings.destroy', training.id)" method="delete" as="button">Destroy</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>

<style scoped lang="scss"></style>
