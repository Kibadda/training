<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';

defineProps({
    exercises: Array,
});
</script>

<template>
    <Layout title="Exercise">
        <Link :href="route('exercises.create')">Add</Link>
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
                <tr v-for="exercise in exercises">
                    <td>{{ exercise.name }}</td>
                    <td>{{ exercise.created_at }}</td>
                    <td>{{ exercise.updated_at }}</td>
                    <td>
                        <Link :href="route('exercises.edit', exercise.id)">Edit</Link>
                        <Link :href="route('exercises.destroy', exercise.id)" method="delete" as="button">Destroy</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>

<style scoped lang="scss"></style>
