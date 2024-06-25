<template>
  <div class="container">
    <h1>Register</h1>
    <form @submit.prevent="submitRegister">
      <div class="form-group mb-3">
        <Error label="Email address" :errors="v$.email.$errors">
          <BaseInput v-model="registerInput.email" type="email"/>
        </Error>
      </div>
      <div class="form-group mb-3">
        <Error label="Password" :errors="v$.password.$errors">
          <BaseInput v-model="registerInput.password" type="password"/>
        </Error>
      </div>
      <br>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" :loading="loading">Register</button>
      </div>
    </form>
    <p class="text-muted mt-3">Already have an account? <router-link to="/login">Login</router-link></p>
  </div>
</template>

<script setup lang="ts">
import { registerInput, useRegisterUser } from './actions/register';
import { useVuelidate } from '@vuelidate/core';
import { required, email } from '@vuelidate/validators';
import { reactive } from 'vue';

const form = reactive(registerInput);

const rules = {
  email: { required, email },
  password: { required }
};

const v$ = useVuelidate(rules, form);
const { loading, register } = useRegisterUser();
async function submitRegister() {
  v$.value.$touch();
  if (!v$.value.$validate()) return

  await register();
}

</script>

<style scoped>
.container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
}
</style>