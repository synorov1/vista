<script lang="ts" setup>
import { useSlots } from 'vue';

const slots = useSlots();
</script>

<template>
  <div class="social-links d-flex">
    <a
      href="https://www.youtube.com"
      target="_blank"
      class="social-links__item"
    >
      <img
        src="@/assets/icons/youtube.svg"
        alt="YouTube"
        class="social-links__image"
      >
    </a>
    <a
      href="https://www.telegram.com"
      target="_blank"
      class="social-links__item"
    >
      <img
        src="@/assets/icons/telegram.svg"
        alt="Telegram"
        class="social-links__image"
      >
    </a>
    <a
      href="https://www.vk.com"
      target="_blank"
      class="social-links__item"
    >
      <img
        src="@/assets/icons/vk.svg"
        alt="VK"
        class="social-links__image"
      >
    </a>

    <slot v-if="slots.additionally" name="additionally" />
  </div>
</template>

<style scoped>
.social-links {
  gap: 14px;
}

.social-links__item {
  width: 45px;
  height: 45px;
  background-color: rgba(0, 132, 255, 0.1);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  color: var(--black-color);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
}

.social-links__image {
  width: 24px;
  height: 24px;
  display: block;
}

@media (min-width: 768px) {  
  .social-links__item {
    font-size: 28px;
    line-height: 34px;
    width: 55px;
    height: 55px;
  }

  .social-links__image {
    width: 30px;
    height: 30px;
  }
}

@media (min-width: 1024px) {  
  .social-links__item {
    font-size: 34px;
    line-height: 41px;
    width: 45px;
    height: 45px;
  }

  .social-links__image {
    width: 24px;
    height: 24px;
  }
}

@media (min-width: 1440px) {  
  .social-links__item {
    font-size: 34px;
    line-height: 41px;
    width: 45px;
    height: 45px;
  }
}
</style>