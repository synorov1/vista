<template>
  <label>
    <span v-if="props.label">{{ props.label }} <b v-if="props.required">*</b></span>
    <div class="select">
      {{ modelValue }}
      <div class="items-list"
      :type="props.type"
      :placeholder="props.placeholder"
      :required="props.required"
      @focus="isFocused = true"
      @blur="handleBlur"
    >
      <div class="item"
        v-for="(item, index) in props.items"
        :key="index"
        @click="selectItem(item)"
      >
        {{ item }}
      </div>
    </div>
    </div>
  </label>
</template>

<script setup lang="ts">
import { ref, watch, computed } from 'vue';

interface Props {
  modelValue?: string;
  type?: string;
  placeholder?: string;
  label?: string;
  required?: boolean;
  items?: string[];
}

const props = withDefaults(defineProps<Props>(), {
  type: 'text',
  placeholder: '',
  label: '',
  required: false,
  items: () => []
});

const emit = defineEmits<{
  (e: 'update:modelValue', value: string): void;
}>();

const modelValue = ref(props.modelValue || ''); 
const isFocused = ref(false);

watch(modelValue, (newValue) => {
  if (newValue !== undefined) {
    emit('update:modelValue', newValue); 
  }
});

const handleBlur = () => {
  setTimeout(() => {
    isFocused.value = false;
  }, 200);
};

const selectItem = (item: string) => {
  modelValue.value = item; 
  isFocused.value = false;
};
</script>

<style scoped>
label {
  display: flex;
  flex-direction: column;
  gap: 10px;
  position: relative;
}

.items-list {
  position: absolute;
  top: calc(100% + 5px);
  left: 0;
  padding: 10px;
  border-radius: 10px;
  background: #fff;
  color: #000;
  font-size: 14px;
  font-weight: 400;
  width: 100%;
  z-index: 2;
  list-style: none;
  box-shadow: 0px 4px 10px 0px #00000026;

}

.item {
  height: 45px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  padding-left: 14px;
}

.item:hover {
  background: #F0F0F0;
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
.select {
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

.select:focus {
  outline: none;
  border-color: #0084FF;
}
</style>