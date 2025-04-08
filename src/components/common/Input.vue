<template>
  <label>
    <span v-if="props.label">{{ props.label }} <b v-if="props.required">*</b></span>
    <input
      v-model="modelValue"
      :type="props.type"
      :placeholder="props.placeholder"
      :required="props.required"
    >
  </label>
</template>

<script setup lang="ts">
import { ref, watch } from "vue";

interface Props {
  // eslint-disable-next-line vue/require-default-prop
  modelValue?: string;
  type?: string;
  placeholder?: string;
  label?: string;
  required?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  type: "text",
  placeholder: "",
  label: "",
  required: false
});

const emit = defineEmits<{
  (e: 'update:modelValue', value: string): void; 
}>();

const modelValue = ref(props.modelValue); 
watch(modelValue, (newValue) => {
  if (newValue !== undefined) {
    emit('update:modelValue', newValue); 
  }
});
</script>

<style scoped>
label {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
span {
  font-size: 14px;
  font-weight: 400;
  line-height: 100%;
  color: #000;
}
b {
  color: #0084FF;
  font-size: 14px;
  font-weight: 400;
  line-height: 100%;
}
input {
  height: 45px;
  border: 1px solid #D9D9D9;
  display: flex;
  padding: 14px 16px;
  border-radius: 6px;
  background: #fff;
  color: #000;
  font-size: 14px;
  font-weight: 400;
}

input:focus {
  outline: none;
  border-color: #0084FF;
}
</style>