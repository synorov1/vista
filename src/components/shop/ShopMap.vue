<script lang="ts" setup>
import RedButton from '@/components/common/Buttons/RedButton.vue';

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <section class="shop-map">
    <div class="shop-map__map" />

    <div class="shop-map__content">
      <p class="shop-map__title">
        {{ props.title }}
      </p>
    
      <p class="shop-map__text">
        {{ props.text }}
      </p>

      <RedButton
        class="w-100"
        text="Построить маршрут"
        height="45px"
      />
    </div>
  </section>
</template>

<style scoped>
.shop-map {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.shop-map__map {
  height: 250px;
  width: 100%;
  background-color: var(--gray-200-color);
  border-radius: 20px;
  overflow: hidden;
}

.shop-map__title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 16px;
}

.shop-map__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  margin-bottom: 16px;
}

@media (min-width: 768px) {
  .shop-map__map {
    height: 350px;
  }

  .shop-map__title {
    font-size: 30px;
    line-height: 36px;
  }
}

@media (min-width: 1024px) {
  .shop-map {
    flex-direction: row;
    align-items: center;
  }

  .shop-map__map {
    height: 430px;
    width: 647px;
    flex-shrink: 0;
  }

  .shop-map__title {
    font-size: 34px;
    line-height: 41px;
  }

  .shop-map__text {
    margin-bottom: 30px;
  }
}

@media (min-width: 1440px) {
  .shop-map__map {
    width: 790px;
  }
}
</style>