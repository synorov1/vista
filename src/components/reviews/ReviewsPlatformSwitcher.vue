<template>
  <div class="switcher">
    <div class="platforms">
      <button 
        v-for="platform in platforms" 
        :key="platform.id"
        :class="[
          'platform-button', 
          { active: activePlatform === platform.id }
        ]"
        @click="selectPlatform(platform.id)"
      >
        <img 
          :src="platform.icon" 
          alt="" 
          class="platform-icon" 
        />
        <span class="platform-name">{{ platform.name }}</span>
        <span class="platform-rating" v-if="platform.rating">{{ platform.rating }}</span>
      </button>
    </div>
    <div class="select-container">
      <Select
        v-model="activePlatform"
        :options="selectOptions"
        placeholder="Выберите платформу"
      >
        <template #default="{ option }">
          <div class="select-item" v-if="option">
            <img 
              :src="option.icon" 
              alt="" 
              class="platform-icon" 
            />
            <span class="platform-name">{{ option.title }}</span>
            <span class="platform-rating" v-if="option.rating">{{ option.rating }}</span>
          </div>
          <div v-else>Выберите платформу</div>
        </template>
        <template #option="{ option }">
          <div class="select-item" v-if="option">
            <img 
              :src="option.icon" 
              alt="" 
              class="platform-icon" 
            />
            <span class="platform-name">{{ option.title }}</span>
            <span class="platform-rating" v-if="option.rating">{{ option.rating }}</span>
          </div>
        </template>
      </Select>
    </div>
    <div class="reviews__rating">
      <ReviewsAllRating/>
    </div>
  </div>
</template>

<script setup lang="ts">
// @ts-ignore
import AllPlatformIcon from "@/assets/icons/reviews/all.svg"
// @ts-ignore
import GisPlatformIcon from "@/assets/icons/reviews/2gis.svg"
// @ts-ignore
import YandexPlatformIcon from "@/assets/icons/reviews/yandex.svg"
// @ts-ignore
import GooglePlatformIcon from "@/assets/icons/reviews/google.svg"

// @ts-ignore
import Select from "@/components/Select.vue";
import type { Options } from "@/components/Select.vue";
import { ref, computed, watch } from 'vue';
import ReviewsAllRating from "./ReviewsAllRating.vue";

type Platform = 'all' | '2gis' | 'yandex' | 'google';

interface PlatformOption {
  id: Platform;
  name: string;
  icon: string;
  rating?: string;
}

const platforms: PlatformOption[] = [
  { id: 'all', name: 'Все', icon: AllPlatformIcon, rating: '4.8' },
  { id: '2gis', name: '2GIS', icon: GisPlatformIcon, rating: '4.9' },
  { id: 'google', name: 'Google', icon: GooglePlatformIcon, rating: '4.6' },
  { id: 'yandex', name: 'Яндекс карты', icon: YandexPlatformIcon, rating: '4.7' },
];

const activePlatform = ref<Platform>('all');

const emit = defineEmits<{
  (e: 'change', platform: Platform): void
}>();

function selectPlatform(platform: Platform) {
  activePlatform.value = platform;
  emit('change', platform);
}

// Преобразование данных платформ в формат для Select
const selectOptions = computed<Options[]>(() => {
  return platforms.map(platform => ({
    id: platform.id,
    title: platform.name,
    icon: platform.icon,
    rating: platform.rating
  }));
});

// Отслеживаем изменение значения Select для emit события
function updateValue() {
  emit('change', activePlatform.value);
}

// Реагируем на изменения значения activePlatform
watch(activePlatform, (newValue: Platform) => {
  emit('change', newValue);
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