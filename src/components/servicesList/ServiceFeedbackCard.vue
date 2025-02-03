<script setup lang="ts">

import XSBlueButton from "@/components/common/Buttons/XSBlueButton.vue";
</script>

<template>
  <div class="service-feedback-card">
    <div class="service-feedback-card__info">
      <div class="service-feedback-card__title">Не нашли услугу?</div>
      <div class="service-feedback-card__text">Попробуйте найти услугу по нашему поиску или оставьте ваш номер телефона нашим менеджерам, мы вам поможем!</div>
      <XSBlueButton class="service-feedback-card__btn" is-border height="45px" text="Оставить заявку менеджеру" />
    </div>
  </div>
</template>

<style scoped>
  .service-feedback-card {
    width: 380px;
    padding: 30px;
    background-color: var(--blue-400-color);
    background-image: url("/images/services/services-feedback-card-bg.png");
    background-position: -50px -140px;
    background-repeat: no-repeat;
    border-radius: 20px;

    @media (max-width: 1440px) {
      background-position: 610px -345px;
    }

    @media (max-width: 1200px) {
      background-position: 480px -345px;
    }

    @media (max-width: 991px) {
      background-position: 275px -345px;
    }

    @media (max-width: 768px) {
      padding: 15px;
      background-position: 60% -165px;
    }

    @media (max-width: 440px) {
      background-position: 50% -165px;
    }

    @media (max-width: 401px) {
      background-position: 50% -130px;
    }

    @media (max-width: 401px) {
      background-position: 50% -130px;
    }

    @media (max-width: 347px) {
      background-position: 50% -90px;
    }
  }

  .service-feedback-card__info {
    @media (max-width: 1440px) {
      max-width: 470px;
    }

    @media (max-width: 1200px) {
      max-width: 315px;
    }

    @media (max-width: 768px) {
      max-width: 100%;
    }
  }

  .service-feedback-card__title {
    font-size: 30px;
    font-weight: 800;
    color: var(--white-color);
    margin-bottom: 10px;
  }

  .service-feedback-card__text {
    color: var(--white-color);
    margin-bottom: 400px;

    @media (max-width: 1440px) {
      margin-bottom: 70px;
    }

    @media (max-width: 768px) {
      margin-bottom: 10px;
    }
  }

  .service-feedback-card__btn {
    width: 100%;

    @media (max-width: 1440px) {
      width: 235px;
    }

    @media (max-width: 768px) {
      width: 100%;
      margin-bottom: 290px;
    }
  }
</style>