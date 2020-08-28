<template>
  <v-progress-circular
    indeterminate
    size="30"
    :loading="loading"
    class="mx-auto"
  ></v-progress-circular>
</template>

<script>
export default {
    props: ['loading']
}
</script>

<style>

</style>
