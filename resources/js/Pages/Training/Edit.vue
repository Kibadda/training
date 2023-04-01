<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Form from '../Components/Form.vue';
import Input from '../Components/Input.vue';
import Select from '../Components/Select.vue';
import Submit from '../Components/Submit.vue';

const props = defineProps({
    training: Object,
    exercises: Array,
    selected: Array,
});

const form = useForm({
    id: props.training.id,
    name: props.training.name,
    exercises: props.selected.map(exercise => {
        return {
            id: exercise.id,
            pivot: {
                sets: exercise.pivot.sets,
                repetitions: exercise.pivot.repetitions,
            },
            _exercise: exercise,
        }
    }),
});

function addExercise(index) {
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

function removeExercise(index) {
    const exercise = form.exercises.splice(index, 1)[0];
    props.exercises.push(exercise._exercise);
}
</script>

<template>
    <Layout title="Training">
        <Link :href="route('trainings.index')" class="fixed">Back</Link>
        <Form @submit.prevent="form.put(route('trainings.update', training.id))">
            <Input v-model="form.name" :error="form.errors.name" label="Name" />
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
