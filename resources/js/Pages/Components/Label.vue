<script setup>
defineProps({
    id: String,
    text: String,
    error: String,
});
</script>

<template>
    <label :for="id">
        {{ text }} <span v-if="error">{{ error }}</span>
    </label>
</template>

<style scoped lang="scss">
label {
    font-weight: bold;
    cursor: pointer;

    span {
        margin-left: 3rem;
        color: red;
    }
}
</style>
