<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Select from '../Components/Select.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    plan: Object,
    trainings: Array,
    selected: Array,
});

const form = useForm({
    id: props.plan.id,
    name: props.plan.name,
    active: props.plan.active,
    trainings: props.selected.map(training => {
        return {
            id: training.id,
            _training: training,
        }
    }),
});

function addTraining(index) {
    const training = props.trainings.splice(index, 1)[0];
    form.trainings.push({
        id: training.id,
        _training: training,
    });
}

function removeTraining(index) {
    const training = form.trainings.splice(index, 1)[0];
    props.trainings.push(training._training);
}
</script>

<template>
    <Layout title="Plan">
        <Link :href="route('plans.index')">Back</Link>
        <Form @submit.prevent="form.put(route('plans.update', plan.id))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
            <Input v-model="form.active" label="Active" type="checkbox" />
            <Select label="Trainings" :options="trainings" @value-changed="addTraining" />
            <div class="row" v-for="(exercise, index) in form.trainings" :key="index">
                <div>{{ exercise._training.name }}</div>
                <button type="button" @click="removeTraining(index)">Remove</button>
                <Input v-model="exercise.id" type="hidden" />
            </div>
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
