<template>
  <div class="switcher">
    <div class="platforms">
      <button 
        v-for="type in types" 
        :key="type.id"
        :class="[
          'platform-button',
          { active: activeType === type.id }
        ]"
        @click="selectPlatform(type.id)"
      >
        <span class="platform-name">{{ type.name }}</span>
      </button>
    </div>
    <div class="select-container">
      <Select
        v-model="activeType"
        :options="selectOptions"
        placeholder="Выберите платформу"
      >
        <template #default="{ option }">
          <div class="select-item" v-if="option">
            <span class="platform-name">{{ option.title }}</span>
          </div>
          <div v-else>Выберите способ доставки</div>
        </template>
        <template #option="{ option }">
          <div class="select-item" v-if="option">
            <span class="platform-name">{{ option.title }}</span>
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

<style scoped>
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

.select-container {
  display: none;
  width: 100%;
}

.reviews__rating {
  @media (max-width: 767px) {
    display: none;
  }
}


.platform-button {
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

.platform-name, .platform-rating {
  white-space: nowrap;
}

.platform-button:not(:last-child)::after {
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

.platform-button.active {
  background-color: #F5F5F5;
  color: #000;
}

.platform-icon {
  width: 20px;
  height: 20px;
  flex-shrink: 0;
}

.select-item {
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

  .rating__text {
    min-width: 131px;
    font-size: 12px;
  }
  
  .platform-button {
    gap: 6px;
  }


}

@media (max-width: 768px) {
  .platform-button, .platforms {
    height: 34px;
  }
}

@media (max-width: 767px) {
  .select-container {
    display: block;
  }
  .platforms {
    display: none;
  }
}
</style>