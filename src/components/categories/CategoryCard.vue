<template>
  <div class="category-card">
    <div class="image-container">
      <img :src="imageSrc" alt="Category Image" class="category-image" />
    </div>
    <div class="text-container">
      <h5 class="title">{{ title }}</h5>
      <p class="count">{{ count }} товаров</p>
      <p class="description">{{ description }}</p>
      <XSBlueButton text="Перейти к товарам" height="45px" />
    </div>
  </div>
</template>

<script setup lang="ts">
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';

defineProps({
  imageSrc: {
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  count: {
    type: Number,
    required: true
  },
  description: {
    type: String,
    required: true
  }
});
</script>

<style scoped>

.category-card {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 16px;
  min-width: 288px;
  background: var(--gray-200-color);
  border-radius: 16px;
  transition: background-color 0.3s ease;
  height: 487px;
}

.category-card:hover {
  background-color: #E3E8FC;
}

.image-container {
  width: 256px;
  height: 80px;
  position: relative;
}

.category-image {
  width: 69.9px;
  height: 86.6px;
  position: absolute;
  left: calc(50% - 69.9px/2 - 110.05px);
  top: calc(50% - 86.6px/2 + 25.44px);
  background: url('path/to/your/image.png');
  transform: rotate(-32.09deg);
}

.text-container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0;
  gap: 16px;
}

.title {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 800;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.count {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.description {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 14px;
  line-height: 24px;
  color: var(--gray-800-color);
}

.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  width: 100%;
  height: 45px;
  background: var(--blue-400-color);
  border-radius: 6px;
  color: var(--white-color);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
}

@media (min-width: 1024px) {
  .description {
    font-size: 16px;
    line-height: 24px;
  }
}

@media (min-width: 1440px) {
  .category-card {
    height: 511px;
  }
}
</style>
