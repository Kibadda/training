<script setup>
defineProps({
    text: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button class="submit" type="submit">{{ text }}</button>
</template>

<style scoped lang="scss">
button.submit {
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
</style>
