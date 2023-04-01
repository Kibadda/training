<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Select from '../Components/Select.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    trainings: Array,
});

const form = useForm({
    name: '',
    current: false,
    trainings: [],
});

function addTraining(index) {
    if (index > -1) {
        const training = props.trainings.splice(index, 1)[0];
        form.trainings.push({
            id: training.id,
            _training: training,
        });
    }
}

function removeTraining(index) {
    const training = form.trainings.splice(index, 1)[0];
    props.exercises.push(training._training);
}
</script>

<template>
    <Layout title="Plan">
        <Link :href="route('plans.index')">Back</Link>
        <Form @submit.prevent="form.post(route('plans.store'))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
            <Input v-model="form.current" label="Current" type="checkbox" />
            <Select label="Trainings" :options="trainings" @value-changed="addTraining" />
            <div class="row" v-for="(training, index) in form.trainings" :key="index">
                <div>{{ training._training.name }}</div>
                <button type="button" @click="removeTraining(index)">Remove</button>
                <Input v-model="training.id" type="hidden" />
            </div>
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
