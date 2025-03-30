<script setup lang="ts">
import brandsList from "./brandslist.json";
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import BrandsItem from "@/components/brandsList/BrandsItem.vue";
import SquareButton from "@/components/common/Buttons/SquareButton.vue";
import {computed, onMounted, onUnmounted, ref} from "vue";
import AdvertisingBanner from "@/components/common/AdvertisingBanner.vue";
import { useQuestionModal } from '@/composables/useModal'

const visibleCount = ref(9);
const isMobileScreen = ref(false);
const search = ref('');
const { openQuestionModal } = useQuestionModal();

const filteredBrandsList = computed(() => {
  return brandsList.filter((brand) => brand.name.toLowerCase().includes(search.value.toLowerCase()));
})

const checkScreenSize = () => {
  isMobileScreen.value = window.innerWidth < 1024;
  
  if (window.innerWidth < 768) {
    visibleCount.value = 6;
  }
}

const visibleItems = computed(() => {
  if (!isMobileScreen.value) {
    return filteredBrandsList.value;
  }

 return filteredBrandsList.value.slice(0, visibleCount.value);
});

const showMore = () =>  {
  visibleCount.value += 6;
}

const onTitleButtonClick = () => {
  openQuestionModal()
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
  <div class="brands-list">
    <TitleWithButton
      class="brands-title-box"
      title="Все бренды"
      button-text="Задать вопрос"
      :on-button-click="onTitleButtonClick"
    >
      <div class="search">
        <input
          v-model="search"
          type="text"
          placeholder="Введите название бренда"
        >
      </div>
    </TitleWithButton>

    <div class="search search-mobile">
      <input
        v-model="search"
        type="text"
        placeholder="Введите название бренда"
      >
    </div>

    <div class="brands-content">
      <BrandsItem
        v-for="(brand, index) in visibleItems"
        :key="index"
        class="brands-item"
        :link="brand.link"
        :product-count="brand.productCount"
        :logo="brand.logo"
      />

      <div class="advertising-box">
        <AdvertisingBanner
          v-for="(item, index) in [1, 2]"
          :key="index"
          class="advertising-banner"
          image="./src/assets/images/reklama.png"
        />
      </div>
    </div>

    <SquareButton
      v-if="isMobileScreen && visibleCount < brandsList.length"
      text="Показать ешё бренды"
      class="brands-list-btn"
      @click="showMore"
    />

    <div class="advertising-box advertising-box-mobile">
      <AdvertisingBanner
        v-for="(item, index) in [1, 2]"
        :key="index"
        class="advertising-banner"
        image="./src/assets/images/reklama.png"
      />
    </div>
  </div>
</template>

<style scoped>
.brands-list {
  margin-bottom: 100px;
}

.brands-item {
  width: calc((100% - 16px) / 2);

  @media (min-width: 768px) {
    width: calc((100% - 32px) / 3);
  }

  @media (min-width: 1024px) {
    width: calc((100% - 48px) / 4);
  }

  @media (min-width: 1440px) {
    width: calc((100% - 64px) / 5);
  }
}

.advertising-box {
  display: none;
  gap: 16px;

  @media (min-width: 1024px) {
    display: flex;
    width: 698px;
  }

  @media (min-width: 1200px) {
    width: 833px;
  }

  @media (min-width: 1400px) {
    width: 896px;
    height: 303px;
  }

  @media (min-width: 1440px) {
    width: 956px;
  }
}

.advertising-box-mobile {
  display: flex;

    @media (min-width: 1024px) {
      display: none;
    };
}

.advertising-banner {
  width: calc((100% - 16px) / 2);
}

.brands-title-box {
  margin-bottom: 15px;

  @media (min-width: 768px) {
    margin-bottom: 30px;
  }
}

.brands-content {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  margin-bottom: 16px;
}

.brands-list-btn {
  width: 100%;
  margin: 16px 0;
}

.search {
  max-width: 490px;
  width: 100%;
  margin-left: 15px;
  margin-right: auto;
  display: none;

  @media (min-width: 768px) {
    display: block;
  }

  input {
    width: 100%;
    height: 45px;
    padding-left: 10px;
    border: 1px solid var(--gray-400-color);
    border-radius: 6px;
  }

  input::placeholder {
    color: var(--gray-400-color);
  }
}

.search-mobile {
  display: block;
  max-width: 100%;
  margin-bottom: 15px;
  margin-left: 0;

  @media (min-width: 768px) {
    display: none;
  }
}
</style>