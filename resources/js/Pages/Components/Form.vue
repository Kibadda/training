<script setup>
</script>

<template>
    <form>
        <slot />
    </form>
</template>

<style scoped lang="scss">
form {
    padding: 0 15%;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>

<style j lang="scss">
form {
    div.row {
        width: 100%;
        display: grid;
        grid-template-columns: 40% 20% 20% 20%;
        align-items: center;

        div {
            font-weight: bold;
        }
    }
}
</style>
