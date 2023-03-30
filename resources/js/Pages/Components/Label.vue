<script setup>
defineProps({
    id: String,
    text: String,
    error: String,
});

// function toTitleCase(str) {
//     return str.replace(/([a-z])([A-Z])/g, '$1 $2').replace(/([^\W_]+[^\s-]*) */g, function (word) {
//         return word.charAt(0).toUpperCase() + word.substr(1).toLowerCase();
//     });
// }
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
