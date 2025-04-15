<template>
  <div :class="$style.switcher">
    <div :class="$style.platforms">
      <button 
        v-for="type in types" 
        :key="type.id"
        :class="[
          $style.platformButton,
          { [$style.active]: activeType === type.id }
        ]"
        @click="selectPlatform(type.id)"
      >
        <span :class="$style.platformName">{{ type.name }}</span>
      </button>
    </div>
    <div :class="$style.selectContainer">
      <Select
        v-model="activeType"
        :options="selectOptions"
        placeholder="Выберите платформу"
      >
        <template #default="{ option }">
          <div v-if="option" :class="$style.selectItem">
            <span :class="$style.platformName">{{ option.title }}</span>
          </div>
          <div v-else>
            Выберите способ доставки
          </div>
        </template>
        <template #option="{ option }">
          <div v-if="option" :class="$style.selectItem">
            <span :class="$style.platformName">{{ option.title }}</span>
          </div>
        </template>
      </Select>
    </div>
  </div>
</template>

<script setup lang="ts">
// @ts-ignore
import Select from "@/components/Select.vue";
import type { Options } from "@/components/Select.vue";
import { ref, computed, watch } from 'vue';

type DeliveryType = 'pickup' | 'pickup-point' | 'courier';

export interface DeliveryOption {
  id: DeliveryType;
  name: string;
}

const types: DeliveryOption[] = [
  { id: 'pickup', name: 'Самовывоз' },
  { id: 'pickup-point', name: 'Пункт выдачи' },
  { id: 'courier', name: 'Курьер' },
];

const activeType = ref<DeliveryType>('courier');
const emit = defineEmits<{
  (e: 'change', platform: DeliveryOption): void
}>();

function selectPlatform(platform: DeliveryType) {
  activeType.value = platform;
  emit('change', getDeliveryOption(platform));
}

function getDeliveryOption(id: DeliveryType): DeliveryOption {
  return types.find(t => t.id === id)!;
}

const selectOptions = computed<Options[]>(() =>
  types.map(type => ({
    id: type.id,
    title: type.name,
  }))
);

watch(activeType, (newValue) => {
  emit('change', getDeliveryOption(newValue));
});
</script>

<style module>
.switcher {
  display: flex;
  width: 100%;
  gap: 30px;
  align-items: center;
}

.platforms {
  display: flex;
  flex-wrap: nowrap;
  border-radius: 6px;
  border: 1px solid #D9D9D9;
  overflow: hidden;
  height: 45px;
  min-width: 0;
  flex-shrink: 0;
}

.selectContainer {
  display: none;
  width: 100%;
}

.reviewsRating {
  @media (max-width: 767px) {
    display: none;
  }
}

.platformButton {
  display: flex;
  align-items: center;
  background-color: #ffffff;
  color: #A0A0A0;
  transition: background-color 0.2s ease, color 0.2s ease;
  font-size: 14px;
  font-weight: 600;
  gap: 10px;
  border: none;
  height: 45px;
  padding: 0 14px;
  position: relative;
  white-space: nowrap;
  flex-shrink: 0;
  flex: 1 0 auto;
  min-width: 0;
  max-width: fit-content;
}

.platformName, .platformRating {
  white-space: nowrap;
}

.platformButton:not(:last-child)::after {
  content: "";
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 1px;
  height: 16px;
  border-radius: 100%;
  background-color: #D9D9D9;
}

.platformButton.active {
  background-color: #F5F5F5;
  color: #000;
}

.platformIcon {
  width: 20px;
  height: 20px;
  flex-shrink: 0;
}

.selectItem {
  display: flex;
  align-items: center;
  gap: 10px;
}

@media (max-width: 1000px) {
  .switcher {
    gap: 24px;
  }

  .rating {
    align-items: flex-start;
    gap: 4px;
  }

  .rating img {
    height: 14px;
    width: 14px;
    flex-shrink: 0;
  }

  .ratingText {
    min-width: 131px;
    font-size: 12px;
  }
  
  .platformButton {
    gap: 6px;
  }
}

@media (max-width: 768px) {
  .platformButton, .platforms {
    height: 34px;
  }
}

@media (max-width: 767px) {
  .selectContainer {
    display: block;
  }
  .platforms {
    display: none;
  }
}
</style>