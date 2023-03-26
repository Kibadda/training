<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    url: String,
    fields: Object,
    method: String,
    action: String,
});

const formFields = {}

Object.keys(props.fields).forEach(key => {
    if (typeof props.fields[key] === 'object') {
        formFields[key] = props.fields[key].value;
    } else {
        formFields[key] = props.fields[key];
    }
});

const form = useForm(formFields);

const { id, ...fields } = props.fields;

function toTitleCase(str) {
    return str.replace(/([a-z])([A-Z])/g, '$1 $2').replace(/([^\W_]+[^\s-]*) */g, function (word) {
        return word.charAt(0).toUpperCase() + word.substr(1).toLowerCase();
    });
}
</script>

<template>
    <form @submit.prevent="form[method](url)">
        <input v-if="form.id" type="hidden" name="id" :value="form.id" />
        <div v-for="(field, name) in fields">
            <label :for="name">
                {{ toTitleCase(name) }} <span v-if="form.errors[name]">{{ form.errors[name] }}</span>
            </label>
            <input :id="name" :name="name" :type="field.type" v-model="form[name]" />
        </div>
        <button type="submit" :disabled="form.processing">{{ action }}</button>
    </form>
</template>

<style scoped lang="scss">
form {
    width: 40%;
    display: flex;
    flex-direction: column;
    align-items: center;

    div {
        width: 100%;
        margin: .5rem;
        display: flex;
        flex-direction: column;

        label {
            font-weight: bold;
            cursor: pointer;

            span {
                margin-left: 3rem;
                color: red;
            }
        }

        input {
            padding: .25rem;
            border: 1px solid #555555;
            background-color: #434343;
            color: white;
            font-size: 1rem;
        }

        &.error {
            input {
                border-color: red;
            }
        }
    }

    button {
        width: 50%;
        border: 2px solid #ff2d20;
        background-color: #ff2d20;
        color: white;
        padding: .5rem;
        border-radius: .5rem;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        margin: .5rem;

        &:hover {
            background-color: #434343;
            color: #ff2d20;
        }
    }
}
</style>
