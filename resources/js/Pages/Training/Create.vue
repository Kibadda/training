<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Select from '../Components/Select.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    exercises: Array,
});

const form = useForm({
    name: '',
    exercises: [],
});

function addExercise(index) {
    if (index > -1) {
        const exercise = props.exercises.splice(index, 1)[0];
        form.exercises.push({
            id: exercise.id,
            pivot: {
                sets: 3,
                repetitions: 10,
            },
            _exercise: exercise,
        });
    }
}

function removeExercise(index) {
    const exercise = form.exercises.splice(index, 1)[0];
    props.exercises.push(exercise._exercise);
}
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.index')" class="fixed">Back</Link>
        <Form @submit.prevent="form.post(route('trainings.store'))">
            <Input v-model="form.name" label="Name" :error="form.errors.name" />
            <Select label="Exercises" :options="exercises" @value-changed="addExercise" />
            <div class="row" v-for="(exercise, index) in form.exercises" :key="index">
                <div>{{ exercise._exercise.name }}</div>
                <Input v-model="exercise.pivot.sets" :error="form.errors[`exercises.${index}.pivot.sets`]" type="number" />
                <Input v-model="exercise.pivot.repetitions" :error="form.errors[`exercises.${index}.pivot.repetitions`]"
                    type="number" />
                <button type="button" @click="removeExercise(index)">Remove</button>
                <Input v-model="exercise.id" type="hidden" />
            </div>
            <Submit :disabled="form.processing" />
        </Form>
    </Layout>
</template>

<style scoped lang="scss"></style>
