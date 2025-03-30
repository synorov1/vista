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
            @click="handleClick"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, onUnmounted, ref, defineAsyncComponent } from "vue"
import { useQuestionModal } from '@/composables/useModal'

const CatalogTabsMenu = defineAsyncComponent(() => import("@/components/catalog/CatalogTabsMenu.vue"))
const RecommendationBanner = defineAsyncComponent(() => import("@/components/common/RecommendationBanner.vue"))
const GreyButton = defineAsyncComponent(() => import("@/components/common/Buttons/GreyButton.vue"))
const CatalogTabsMobileMenu = defineAsyncComponent(() => import("@/components/catalog/CatalogTabsMobileMenu.vue"))

defineOptions({
  name: 'HeaderCatalog'
})

const { openQuestionModal } = useQuestionModal()

const isMobileScreen = ref(false)

const checkScreenSize = () => {
  isMobileScreen.value = window.innerWidth < 768
}

const handleClick = () => {
  openQuestionModal()
}

onMounted(() => {
  window.addEventListener("resize", checkScreenSize)
  checkScreenSize()
})

onUnmounted(() => {
  window.removeEventListener("resize", checkScreenSize)
})
</script>

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