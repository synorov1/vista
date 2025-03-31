<script setup lang="ts">
import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import Card from '@/components/cards/Card.vue';
import BlackArrowButton from '~/components/common/buttons/BlackArrowButton.vue';
import { Carousel, Slide, Pagination } from 'vue3-carousel';
import type { CarouselConfig, CarouselExposed } from 'vue3-carousel';
import {ref} from "vue";


interface HotDealsData {
  title: string;
  subtitle: string;
  heading: string;
  timer: {
    text: string;
  };
  button: {
    text: string;
    to: string;
  };
  items: Array<{
    id: number;
    title: string;
    image: string;
    price: number;
    oldPrice: number;
    rating: number;
    liked: boolean;
  }>;
}

defineProps<{
  data: HotDealsData;
}>();

const carouselRef = ref<CarouselExposed | null>();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 2,
  wrapAround: true,
  gap: 10,
  breakpoints: {
    768: {
      itemsToShow: 1,
      gap: 16,
    },
    1024: {
      itemsToShow: 2,
    },
    1440: {
      itemsToShow: 3,
    },
  },
  itemsToScroll: 1,
  height: '',
  i18n: {},
  enabled: true,
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  slideEffect: 'slide',
};
</script>

<template>
  <section>
    <TtileWithArrow
      :title="data.title"
      :class="$style.header"
      @button-click="() => console.log(data.title)"
    />
    
    <div class="flex flex-col" :class="$style.section">
      <div :class="$style.topMobile">
        <Carousel
          ref="carouselRef"
          class="carousel carousel-progress"
          v-bind="config"
        >
          <Slide
            v-for="item in data.items"
            :key="item.id"
            :class="$style.card"
          >
            <Card v-bind="item" />
          </Slide>
          
          <template #addons>
            <Pagination class="carousel-progress__pagination" :class="$style.pagination" />
          </template>
        </Carousel>
      </div>
      
      <div :class="$style.topDesktop">
        <Carousel
          ref="carouselRef"
          class="carousel carousel-progress"
          v-bind="config"
        >
          <Slide
            v-for="item in data.items2"
            :key="item.id"
            :class="$style.card"
          >
            <div class="flex flex-col" :class="$style.topCards">
              <Card v-for="(card, index) in item" :key="index" v-bind="card" />
            </div>
          </Slide>
          
          <template #addons>
            <Pagination class="carousel-progress__pagination" :class="$style.pagination" />
          </template>
        </Carousel>
      </div>
  
      <div :class="$style.bottom">
        <BlackArrowButton :text="data.button.text" :class="$style.button" />
        
        <div class="flex flex-col" :class="$style.info">
          <div :class="$style.subtitle">{{ data.subtitle }}</div>
          <div :class="$style.heading">{{ data.heading }}</div>
        </div>
  
        <div :class="$style.timer">
          <span :class="$style.timerIcon">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_44_7515)">
                <path d="M10.0001 18.3333C14.6025 18.3333 18.3334 14.6023 18.3334 9.99996C18.3334 5.39759 14.6025 1.66663 10.0001 1.66663C5.39771 1.66663 1.66675 5.39759 1.66675 9.99996C1.66675 14.6023 5.39771 18.3333 10.0001 18.3333Z" stroke="#FF4245" stroke-width="1.5"/>
                <path d="M10 6.66663V9.99996L12.0833 12.0833" stroke="#FF4245" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
                <clipPath id="clip0_44_7515">
                  <rect width="20" height="20" fill="white"/>
                </clipPath>
              </defs>
            </svg>
          </span>
          {{ data.timer.text }}
        </div>
        
        <Carousel
          ref="carouselRef"
          class="carousel carousel-progress"
          :class="$style.recommends"
          v-bind="config"
        >
          <Slide v-for="item in data.items" :key="item.id">
            <Card v-bind="item" />
          </Slide>
          
          <template #addons>
            <Pagination class="carousel-progress__pagination" :class="$style.pagination" />
          </template>
        </Carousel>
        
        <div :class="$style.cards">
          <Card
            v-for="item in data.items.slice(0, 2)"
            :key="item.id"
            :class="$style.card"
            v-bind="item"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<style module>
.header {
  margin-bottom: 20px;
  
  @media (min-width: 768px) {
    margin-bottom: 30px;
  }
}

.section {
  gap: 20px;
  
  @media (min-width: 768px) {
    flex-direction: row;
    justify-content: space-between;
  }
}

.topMobile {
  margin-bottom: 20px;
  
  @media (min-width: 768px) {
    display: none;
  }
}

.topDesktop {
  display: none;
  
  @media (min-width: 768px) {
    display: block;
    width: 32%;
    height: 100%;
  }
  @media (min-width: 1024px) {
    width: 50%;
  }
}

.topCards {
  gap: 30px;
}

.bottom {
  position: relative;
  background: var(--gray-50-color);
  border-radius: 20px;
  padding: 16px 16px 36px 16px;
  
  @media (min-width: 768px) {
    padding: 30px;
    flex: 0 1 460px;
  }
}

.recommends {
  @media (min-width: 768px) {
    display: none;
  }
}

.info {
  gap: 6px;
  max-width: 60%;
  margin-bottom: 16px;
}

.subtitle {
  font-size: 14px;
}

.heading {
  font-size: 30px;
  font-weight: 800;
  line-height: 1.2;
}

.button {
  position: absolute;
  top: 16px;
  right: 16px;
  height: 50px;
}

.timer {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 14px;
  border-radius: 100px;
  font-weight: 600;
  font-size: 14px;
  color: var(--black-color);
  background: var(--white-color);
  width: fit-content;
  margin-bottom: 20px;
}

.timerIcon {
  color: var(--red-100-color);
}

.pagination {
  bottom: -20px;
  
  @media (min-width: 768px) {
    bottom: -30px;
    width: 90vw;
  }
  @media (min-width: 1024px) {
    width: 94vw;
  }
  @media (min-width: 1440px) {
    width: 83vw;
  }
}

.cards {
  display: none;
  
  @media (min-width: 768px) {
    display: flex;
    gap: 10px;
  }
}
</style>
