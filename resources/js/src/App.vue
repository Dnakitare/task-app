<script lang="ts" setup>
import { ref } from 'vue'

const count = ref<number>(0)
</script>

<template>
  <div class="container">
    <h1>This is working - Vue 3</h1>
    {{ count }}

    <button type="button" @click="count++">Increment</button>
    <RouterView/>
  </div>
</template>