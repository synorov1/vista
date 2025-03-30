<template>
  <div class="sidebar-container">
    <Select
      :model-value="modelValue"
      :options="props.selectValues"
      placeholder="Выберите город"
      @update:model-value="updateValue"
    />
    <GreyButton
      text="Рассказать о площадке"
      type="secondary"
    />
  </div>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from "vue";
import Select from "@/components/Select.vue";
import type { Options } from "@/components/Select.vue";
import GreyButton from "@/components/common/Buttons/GreyButton.vue";

interface Props {
  selectValues: Options[];
  modelValue: string;
}

const props = defineProps<Props>()
const emit = defineEmits(["update:modelValue"]);

const updateValue = (value: string) => {
  emit("update:modelValue", value);
};

</script>

<style scoped>
.sidebar-container {
  width: 100%;
  height: 620px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  border: 1px solid var(--gray-400-color);
  border-radius: 20px;
  padding: 30px;
  box-sizing: border-box;
}

</style>
