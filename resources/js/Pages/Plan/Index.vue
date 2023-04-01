<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';

defineProps({
    plans: Array,
});
</script>

<template>
    <Layout title="Plan">
        <Link :href="route('plans.create')">Add</Link>
        <table class="data">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="plan in plans">
                    <td>{{ plan.name }}</td>
                    <td>{{ plan.active }}</td>
                    <td>{{ plan.created_at }}</td>
                    <td>{{ plan.updated_at }}</td>
                    <td>
                        <Link :href="route('plans.edit', plan.id)">Edit</Link>
                        <Link :href="route('plans.destroy', plan.id)" method="delete" as="button">Destroy</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>

<style scoped lang="scss"></style>
