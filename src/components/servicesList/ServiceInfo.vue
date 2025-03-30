<script setup lang="ts">

import SquareButton from "@/components/common/Buttons/SquareButton.vue";
import TitleWithButton from "@/components/common/TitleWithButton.vue";

defineProps({
  title: {type: String, required: true},
  text: {type: String, required: true},
  price: {type: String, required: true},
  imageFirst: {type: String, required: true},
  imageSecond: {type: String, required: true},
  description: {type: String, required: true},
});
</script>

<template>
  <div class="service-info">
    <TitleWithButton
      :title="title"
      button-text="На главную"
      :on-button-click="() => console.log('На главную')"
      class="service-info__header"
    />

    <p class="service-info__text">
      {{ text }}
    </p>

    <div class="service-info__images">
      <img :src="imageFirst" alt="print">
      <img :src="imageSecond" alt="print">
    </div>
    <SquareButton text="Добавить в корзину" class="service-info__button" />

    <div class="service-info__description" v-html="description" />
  </div>
</template>

<style scoped>
  .service-info__text {
    color: var(--gray-800-color);
  }

  .service-info__header {
    margin-bottom: 30px;
  }

  .service-info__images {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin-bottom: 30px;

    @media (max-width: 768px) {
      flex-direction: column;
      justify-content: center;
      gap: 15px;
    }

    img {
      width: 100%;
      height: 315px;
    }
  }

  .service-info__button {
    width: 100%;
    margin-bottom: 30px;
  }

  .service-info__description {
    display: flex;
    flex-direction: column;
    gap: 10px;
    color: var(--gray-800-color);
    margin-bottom: 40px;

    @media (min-width: 321px) {
      margin-bottom: 60px;
    }

    @media (min-width: 769px) {
      margin-bottom: 80px;
    }

    @media (min-width: 1025px) {
      margin-bottom: 100px;
    }
  }
</style>