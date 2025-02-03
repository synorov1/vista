<script setup lang="ts">

import ServiceCard from "@/components/servicesList/ServiceCard.vue";
import ServiceFeedbackCard from "@/components/servicesList/ServiceFeedbackCard.vue";
import services from "./services.json"
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import {useRouter} from 'vue-router';

const router = useRouter();

function goToHome() {
  router.push({name: 'home'});
}
</script>

<template>
  <div class="services-list">
    <TitleWithButton title="Услуги" button-text="На главную" :on-button-click="goToHome" class="services-list__header" />
    <div class="services-list__content">
      <div class="services-list__cards">

        <ServiceCard class="services-list__card"
            v-for="(service, index) in services"
            :key="index"
            :title="service.title"
           :text="service.text"
           :imageFirst="service['image-first']"
           :imageSecond="service['image-second']"
           :html="service.html"
           :bannerImage="service['banner-image']"
           :price="service.price"
        />
      </div>

      <ServiceFeedbackCard class="services-list__feedback"/>
    </div>
  </div>


</template>

<style scoped>
  .services-list {
    a {
      text-decoration: none;
    }
  }

  .services-list__header {
    margin-bottom: 30px;
  }

.services-list__content {
  display: flex;
  gap: 16px;

  @media (max-width: 1440px) {
    flex-wrap: wrap;
  }

  @media (min-width: 769px) {
    gap: 30px;
  }
}

.services-list__cards {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 30px;
  justify-content: center;

  @media (max-width: 1440px) {
    width: 100%;
  }

  @media (max-width: 768px) {
    grid-template-columns: repeat(1, 1fr);
    gap: 16px;
  }
}

.services-list__card {
  @media (max-width: 1440px) {
    width: 100%;
  }
}


.services-list__feedback {
  margin-top: 24px;

  @media (max-width: 1440px) {
    width: 100%;
  }

  @media (min-width: 320px) {
    margin-top: 0;
  }
}
</style>