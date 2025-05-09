<script setup lang="ts">
import XSBlueButton from "@/components/common/Buttons/XSBlueButton.vue";

defineProps({
  title: { type: String, default: '' },
  text: { type: String, default: '' },
  imageFirst: { type: String, default: '' },
  imageSecond: { type: String, default: '' },
  html: { type: String, default: '' },
  bannerImage: { type: String, default: '' },
  price: { type: String, default: '' },
});
</script>

<template>
  <div class="service-card">
    <h3 class="service-card__title">
      {{ title }}
    </h3>

    <p class="service-card__text">
      {{ text }}
    </p>

    <p class="service-card__price">
      От {{ price }} ₽
    </p>

    <XSBlueButton
      to="/service"
      text="Подробнее"
      class="service-card__btn"
    />
  </div>
</template>

<style scoped>
  .service-card {
    width: 380px;
    padding: 30px;
    background-color: #F5F6FA;
    border-radius: 20px;
  }

  .service-card__title {
    font-family: Inter, sans-serif;
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 10px;
    letter-spacing: -1px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
  }

  .service-card__text {
    height: 95px;
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
    color: var(--gray-800-color);
    margin-bottom: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
  }

  .service-card__price {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 20px;
  }

  .service-card__btn {
    width: 100%;
  }
</style>