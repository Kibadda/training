<script setup>
import Label from '../Components/Label.vue';

defineProps({
    label: String,
    error: String,
    modelValue: [String, Number],
    options: Array,
});

const emit = defineEmits([
    'update:model-value',
    'value-changed',
]);

function change(event) {
    emit('value-changed', event.target.selectedIndex);
    emit('update:model-value', event.target.value);
}
</script>

<template>
    <div>
        <Label :text="label" :error="error" />
        <select :value="modelValue" :class="{ error: error }" @change="change">
            <option v-for="option in options" :value="option.id">{{ option.name }}</option>
        </select>
    </div>
</template>

<style scoped lang="scss">
div {
    width: 100%;
    margin: .5rem;
    display: flex;
    flex-direction: column;

    select {
        padding: .25rem;
        border: 1px solid #555555;
        background-color: #434343;
        color: white;
        font-size: 1rem;

        &.error {
            border-color: red;
        }
    }
}
</style>
