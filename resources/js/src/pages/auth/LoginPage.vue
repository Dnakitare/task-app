<template>
  <div class="container">
    <h1>Login Page</h1>
    <form @submit.prevent="login">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input v-model="email" type="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input v-model="password" type="password" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="text-muted mt-3">Don't have an account? <router-link to="/register">Register</router-link></p>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const email = ref('');
const password = ref('');

const login = () => {
  // Perform login logic here
};
</script>

<style scoped>
.container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
}
</style>