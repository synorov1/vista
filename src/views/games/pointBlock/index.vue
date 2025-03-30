<template>
  <div class="point-block-container">
    <div class="point-block-header">
      <p class="point-block-title">
        {{ title }}
      </p>
      <p class="point-block-subtitle">
        {{ subtitle }}
      </p>
    </div>
    <div class="point-block-content">
      <p class="point-block-content-title">
        Адрес:
      </p>
      <p class="point-block-content-subtitle">
        {{ address }}
      </p>
    </div>
    <div class="point-block-gallery">
      <img
        v-for="(i, idx) in img"
        :key="idx"
        class="point-block-image"
        :src="i"
        :alt="'image-' + idx"
      >
    </div>
    <div class="point-block-content">
      <p class="point-block-content-title">
        Контакт:
      </p>
      <p class="point-block-content-subtitle">
        {{ phoneNumber }}
      </p>
    </div>
    <div class="point-block-content">
      <p class="point-block-content-title">
        Описание:
      </p>
      <p
        :class="{ 'point-block-content-descr-truncated': isTruncated && !isExpanded }"
        :style="{ '-webkit-line-clamp': isExpanded ? 'unset' : maxLines }"
        class="point-block-content-descr"
      >
        {{ description }}
      </p>
      <button
        class="point-block-content-button"
        @click="toggleTruncate"
      >
        {{ isExpanded ? 'Свернуть' : 'Показать ещё' }}
      </button>
    </div>
    <SquareButton text="Перейти на сайт" />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import SquareButton from "@/components/common/Buttons/SquareButton.vue";

interface Props {
  title: string;
  subtitle: string;
  address: string;
  phoneNumber: string;
  description: string;
  link: string;
  img: string[];
}

defineProps<Props>()

const isTruncated = ref(false);
const isExpanded = ref(false);
const maxLines = ref(3);

const toggleTruncate = () => {
  isExpanded.value = !isExpanded.value;
};

</script>

<style scoped>
.point-block-container {
  border: 1px solid var(--gray-400-color);
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 30px;
  flex-wrap: wrap;
}

@media screen and (min-width: 320px) {
  .point-block-container {
    max-width: 288px;
    padding: 16px;
  }
}

@media screen and (min-width: 768px) {
  .point-block-container {
    max-width: 346px;
  }
}

@media screen and (min-width: 1024px) {
  .point-block-container {
    max-width: 650px;
  }
}

@media screen and (min-width: 1440px) {
  .point-block-container {
    max-width: 420px;
  }
}

.point-block-header {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.point-block-title {
  font-size: 26px;
  font-weight: 700;
  line-height: 31px;
  text-align: left;
  margin: 0;
}

.point-block-subtitle {
  font-size: 16px;
  font-weight: 500;
  line-height: 19px;
  text-align: left;
  color: var(--gray-600-color);
  margin: 0;
}

.point-block-content {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.point-block-content > p {
  margin: 0;
}

.point-block-content-title {
  font-size: 16px;
  font-weight: 500;
  line-height: 19px;
  text-align: left;
  color: var(--gray-600-color);
}

.point-block-content-subtitle {
  font-size: 18px;
  font-weight: 700;
  line-height: 22px;
  text-align: left;
}

.point-block-content-descr {
  font-size: 16px;
  line-height: 19px;
  text-align: left;
  color: var(--gray-600-color);
  overflow: hidden;
  text-overflow: ellipsis;
  display: -moz-box;
  -moz-box-orient: vertical;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  box-orient: vertical;
}

.point-block-content-descr-truncated {
  -webkit-line-clamp: 3;
  line-clamp: 3;
}

.point-block-content-button {
  margin-top: 10px;
  cursor: pointer;
  border: none;
  background-color: var(--gray-300-color);
  text-decoration: none;
  display: flex;
  align-items: center;
  border-radius: 6px;
  font-size: 14px;
  padding: 6px 10px;
  max-width: 131px;
}

.point-block-gallery {
  display: flex;
  gap: 16px;
}

.point-block-image {
  border: 1px solid var(--gray-400-color);
  border-radius: 14px;
  width: 120px;
  height: 150px;
}
</style>