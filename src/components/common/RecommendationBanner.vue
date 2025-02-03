<script setup lang="ts">

import XSBlueButton from "@/components/common/Buttons/XSBlueButton.vue";
import BlackArrowButton from "@/components/common/Buttons/BlackArrowButton.vue";

defineProps({
  title: {
    type: String,
    required: true,
  },
  subtitle: {
    type: String,
    required: true,
  },
  price: {
    type: String,
    required: true,
  },

  productImage: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <div class="recommendation-banner">
    <div class="recommendation-banner-title-block">
      <h3 class="recommendation-banner-title">{{ title }}</h3>
      <h2 class="recommendation-banner-subtitle">{{ subtitle }}</h2>

      <XSBlueButton
          :text="`Купить за ${price} ₽`"
          height="45px"
          class="recommendation-banner-buy-btn-horizontal"
      />
    </div>
    
    <div class="recommendation-banner-image">
      <img :src="productImage" alt="product">

      <div class="recommendation-banner-price-badge">
        <img src="/src/assets/icons/clock-circle.svg" alt="clock">
        <p>{{ price }}</p>
      </div>
    </div>

    <div class="recommendation-banner-btn-box">
      <XSBlueButton
          :text="`Купить за ${price} ₽`"
          height="45px"
          class="recommendation-banner-buy-btn"
      />
    </div>

    <BlackArrowButton
        text="Все"
        class="recommendation-banner-image-arrow-btn"
    />
  </div>
</template>

<style scoped>
  .recommendation-banner {
    display: flex;
    flex-direction: column;
    padding: 30px 0;
    border-radius: 20px;
    text-align: center;
    background: url("/src/assets/images/rec-banner-bg.png") no-repeat var(--gray-300-color);
    align-items: center;

    @media (min-width: 768px) and (max-width: 992px) {
      flex-direction: row;
      align-items: flex-end;
      justify-content: space-between;
      width: 100%;
      padding: 30px;
    }
  }

  .recommendation-banner-title-block {
    padding: 0 30px;

    @media (min-width: 768px) and (max-width: 992px) {
      padding: 0;
      text-align: left;
      margin-right: 70px;
    }
  }

  .recommendation-banner-title {
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 5px;

    @media (min-width: 768px) and (max-width: 992px) {
      width: 228px;
    }
  }

  .recommendation-banner-subtitle {
    font-size: 30px;
    font-weight: 800;
    line-height: 36px;

    @media (min-width: 768px) and (max-width: 992px) {
      margin-bottom: 105px;
    }
  }

  .recommendation-banner-image {
    width: 255px;
    height: 255px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    margin-bottom: 28px;

    @media (min-width: 768px) and (max-width: 992px) {
      margin-right: 12px;
      margin-bottom: 0;
    }
  }

  .recommendation-banner-price-badge {
    display: flex;
    align-items: center;
    gap: 0 10px;
    position: absolute;
    right: 25px;
    bottom: 35px;
    padding: 14px;
    transform: rotate(-5.8deg);
    background-color: var(--white-color);
    border-radius: 100px;

    img {
      width: 17px;
      height: 17px;
    }

    p {
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 0 !important;
    }
  }

  .recommendation-banner-btn-box {
    width: 100%;
    padding: 0 30px;

    @media (min-width: 768px) and (max-width: 992px) {
      padding: 0;
    }
  }

  .recommendation-banner-buy-btn {
    width: 100%;

    @media (min-width: 768px) and (max-width: 992px) {
      display: none;
    }
  }

  .recommendation-banner-buy-btn-horizontal {
    display: none;
    width: 100%;

    @media (min-width: 768px) and (max-width: 992px) {
      display: flex;
    }
  }

  .recommendation-banner-image-arrow-btn {
    display: none;
    margin-bottom: auto;

    @media (min-width: 768px) and (max-width: 992px) {
      display: flex;
    }
  }
</style>