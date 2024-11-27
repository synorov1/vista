<template>
    <div class="section">
        <div class="header">
            <div class="title">Популярные товары</div>
            <div class="navigation">
                <LeftArrowButton @click="prev" />
                <RightArrowButton @click="next" />
            </div>
        </div>
        <div class="carousel slide">

            <Carousel class="cards carousel-inner" ref="carouselRef" v-bind="config">
                <Slide v-for="(product, index) in showedProducts" :key="index">
                    <ItemCard :content="product" />
                    <template #addons>
                        <Navigation />
                </template>
                </Slide>
                
            </Carousel>
        </div>
    </div>
</template>

<script setup lang="ts">
import data from './popularProducts.json';
import ItemCard from '~/components/cards/ItemCard.vue';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import LeftArrowButton from '../common/Buttons/LeftArrowButton.vue';
import RightArrowButton from '../common/Buttons/RightArrowButton.vue';
import type { CarouselConfig, CarouselExposed } from 'vue3-carousel';
import { ref, computed, onMounted, onUnmounted } from 'vue';

const products = data;
const isShowMore = ref(false);
const windowWidth = ref(0);
const carouselRef = ref<CarouselExposed | null>();

const showedProducts = computed(() => {
    if (windowWidth.value < 1024 && !isShowMore.value) {
        return products.slice(0, 4);
    }
    if (windowWidth.value < 768 && !isShowMore.value) {
        return products.slice(0, 1);
    }
    return products;
});

const config: CarouselConfig = {
  breakpointMode: 'carousel',
  wrapAround: true,
  snapAlign: 'start',
  itemsToShow: 2,
  gap: 10,
  breakpoints: {
    768: {
      itemsToShow: 3,
      gap: 16
    },
    1024: {
      itemsToShow: 4,
    },
    1440: {
      itemsToShow: 5,
      snapAlign: 'start',
    },
  },
  itemsToScroll: 0,
  height: '',
  i18n: {},
  enabled: true,
};

onMounted(() => {
    windowWidth.value = window.innerWidth;
    window.addEventListener('resize', handleResize);
})

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
})

// const next = () => carouselRef.value.nav.next();
const next = () => {
    const currentSlide = carouselRef.value?.data.currentSlide.value || 1;
    carouselRef.value?.slideTo(currentSlide + 1);

};
const prev = () => {
    const currentSlide = carouselRef.value?.data.currentSlide.value || 1;
    carouselRef.value?.slideTo(currentSlide - 1);
};

const handleResize = () => {
    windowWidth.value = window.innerWidth;
}
</script>

<style scoped>
.section {
    margin-bottom: 40px;
}
.title {
    font-size: 24px;
    font-weight: 800;
    line-height: 29.05px;
    letter-spacing: -0.02em;
}
.header {
    margin-bottom: 30px;
    width: 100%;
    display: flex;
    flex-direction: column-reverse;
}

.show-more-button {
    margin-top: 20px;
    width: 100%;
}
.navigation {
    display: none;
}

@media (min-width: 768px) {
    .header {
        flex-direction: row;
        justify-content: space-between;
    }
    .title {
        font-size: 30px;
        line-height: 36.31px;
    }
    .show-more-button {
        margin-top: 30px;
    }
    .section {
        margin-bottom: 80px;
    }
    .navigation {
        display: flex;
        justify-content: space-between;
        width: 100px;
    }
}

@media (min-width: 1024px) {
    .title {
        font-size: 34px;
        line-height: 41.15px;
    }
}

@media (min-width: 1440px) {
    .section {
        margin-bottom: 128px;
    }
}
</style>