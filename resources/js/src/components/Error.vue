<template>
  <label for="">{{props.label}}</label>
  <div :class="{ error: props.errors.length }">
    <slot></slot>       
    <div class="input-errors" v-for="error of props.errors" :key="error.$uid">
      <div class="small">{{ error.$message }}</div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ErrorObject } from '@vuelidate/core';

const props = defineProps<{
  label: string,
  errors: ErrorObject[]
}>();
</script>

<style scoped>
.input-errors {
  color: red;
}
</style>