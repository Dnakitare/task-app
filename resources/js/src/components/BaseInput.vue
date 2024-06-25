<template>
  <input 
    :value="modelValue" 
    :type="typeof type === 'undefined' ? 'text' : type" 
    class="form-control"
    @input="updateValue" />
</template>

<script setup lang="ts">

defineProps<{
  modelValue: string,
  type?: string,
}>();

const emit = defineEmits<{
  (e: 'update:modelValue', val: any): void
}>();

function updateValue(e: any) {
  const val = e.target.value;
  emit('update:modelValue', val);
}
</script>
