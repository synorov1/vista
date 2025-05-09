<template>
  <div class="wrap">
    <div class="title-container">
      <button
        class="inline-button"
        type="button"
        @click="onButtonClick"
      >
        {{ buttonText }}
      </button>
      <p class="title">
        {{ title }}
      </p>
    </div>

    <slot />

    <div class="title-buttons">
      <slot v-if="slots.additionally" name="additionally" />

      <RoundButton
        class="button"
        :text="buttonText"
        @click="onButtonClick"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
interface Props {
  title: string;
  buttonText: string;
  onButtonClick: (event: MouseEvent) => void;
}

defineProps<Props>()

import RoundButton from "@/components/common/Buttons/RoundButton.vue";
import { useSlots } from 'vue';

const slots = useSlots();
</script>

<style scoped>
.wrap{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  gap: 0 15px;
  padding: 0;
}
.title-container {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.title {
  font-size: 34px;
  font-weight: 800;
  line-height: 41px;
  white-space: nowrap;
  margin: 0;
}

.title-buttons {
  display: flex;
  align-items: center;
}

.inline-button {
  font-size: 14px;
  font-weight: 600;
  line-height: 17px;
  text-align: left;
  text-decoration: underline;
  color: var(--blue-400-color);
  padding: 0;
  border: none;
  background-color: transparent;
  cursor: pointer;
  display: none;
}

.button {
  width: 132px;
}

@media (max-width: 768px) {
  .title {
    font-size: 30px;
    line-height: 36px;
  }
}

@media (max-width: 600px) {
  .button {
    display: none;
  }
  .inline-button {
    display: block;
  }
}

@media (max-width: 320px) {
  .title {
    font-size: 24px;
    line-height: 29px;
  }
}
</style>