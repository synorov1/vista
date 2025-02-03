<script setup lang="ts">
import CatalogTabsMenu from "@/components/catalog/CatalogTabsMenu.vue";
import RecommendationBanner from "@/components/common/RecommendationBanner.vue";
import GreyButton from "@/components/common/Buttons/GreyButton.vue";
import CatalogTabsMobileMenu from "@/components/catalog/CatalogTabsMobileMenu.vue";
import {onMounted, onUnmounted, ref} from "vue";

const isMobileScreen = ref(false);

const checkScreenSize = () => {
  isMobileScreen.value = window.innerWidth < 768;

  console.log(isMobileScreen.value);
}

onMounted(() => {
  window.addEventListener("resize", checkScreenSize);
  checkScreenSize();
})

onUnmounted(() => {
  window.removeEventListener("resize", checkScreenSize);
})

</script>

<template>
  <div class="header-catalog-wrap">
    <div class="header-catalog">
      <div class="header-catalog-container container">
        <CatalogTabsMenu v-if="!isMobileScreen" />

        <CatalogTabsMobileMenu v-else />

        <div class="header-catalog-banner-box">
          <RecommendationBanner
              class="header-catalog-banner"
              title="Рекомендуем вам"
              product-image="/src/assets/images/t-shirt.png"
              price="1250"
              subtitle="Последний шанс купить"
          />


          <GreyButton
              class="header-catalog-btn"
              text="Задать вопрос"
              height="45px"
          />
        </div>
      </div>

    </div>
  </div>
</template>

<style scoped>
.header-catalog-wrap {
  width: 100%;
  height: 100vh;
  background: rgba(0, 0, 0, 0.2);
}

.header-catalog {
  padding: 20px 0;
  border-radius: 0 0 16px 16px;
  box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.05);
  background: rgb(255, 255, 255);
  max-height: calc(100vh - 145px);
  overflow: auto;


  @media (min-width: 321px) {
    padding: 30px 0;
  }

  @media (min-width: 1025px) {
    padding: 30px 0 65px 0;
  }
}

.header-catalog-container {
  display: flex;
  justify-content: space-between;
  gap: 30px;
  flex-direction: column;

  @media (min-width: 992px) {
    flex-direction: row;
  }
}

.header-catalog-banner-box {
  width: 100%;

  @media (min-width: 992px) {
    width: min-content;
  }
}

.header-catalog-btn {
  width: 100%;
  display: none;

  @media (min-width: 1025px) {
    display: flex;
    margin-top: 40px;
  }
}

</style>