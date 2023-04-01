<script setup>
import { inject } from 'vue';
import Label from '../Components/Label.vue';

const { id } = inject('random');

const randomId = id();

defineProps({
    label: String,
    error: String,
    modelValue: [String, Number],
    type: {
        type: String,
        default: 'text',
    },
});

defineEmits([
    'update:model-value',
]);
</script>

<template>
    <div :class="{ hidden: type == 'hidden' }">
        <Label :text="label" :id="randomId" :error="error" />
        <input :type="type" :id="randomId" :value="modelValue" @input="$emit('update:model-value', $event.target.value)"
            :class="{ error: error }" />
    </div>
</template>

<style scoped lang="scss">
div {
    width: 100%;
    margin: .5rem;
    display: flex;
    flex-direction: column;

    input {
        padding: .25rem;
        border: 1px solid #555555;
        background-color: #434343;
        color: white;
        font-size: 1rem;

        &.error {
            border-color: red;
        }
    }

    &.hidden {
        display: none;
    }
}
</style>
