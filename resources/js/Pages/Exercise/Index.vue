<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from '../Layout.vue';

defineProps({
    exercises: Array,
});
</script>

<template>
    <Layout>

        <Head title="Exercise" />

        <div class="block">
            <table class="data">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="exercise in exercises">
                        <td>{{ exercise.name }}</td>
                        <td>{{ exercise.created_at }}</td>
                        <td>{{ exercise.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

<style scoped lang="scss"></style>
