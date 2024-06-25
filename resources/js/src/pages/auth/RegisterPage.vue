<template>
  <div class="container">
    <h1>Register</h1>
    <form @submit.prevent="register">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input v-model="email" type="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input v-model="password" type="password" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="text-muted mt-3">Already have an account? <router-link to="/login">Login</router-link></p>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const email = ref('');
const password = ref('');

const register = () => {
  // Add your registration logic here
  console.log('Registering...');
};
</script>

<style scoped>
.container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
}
</style>