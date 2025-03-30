<script setup lang="ts">
  defineProps({
    logo: {
      type: String,
      required: true
    },
    productCount: {
      type: String,
      required: true
    },
    link: {
      type: String,
      required: true
    }
  })
</script>

<template>
  <div class="brands-item">
    <div class="brands-item-logo">
      <img :src="logo" alt="logo">
    </div>

    <p class="brands-item-text">
      {{ productCount }} товаров
    </p>
    <a :href="link" class="brands-item-btn">
      Перейти
    </a>
  </div>
</template>

<style scoped>
  .brands-item {
    width: 136px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
    padding-bottom: 16px;
    border: 1px solid rgb(217, 217, 217);
    border-radius: 20px;

    @media (min-width: 600px) {
      gap: 30px;
      padding-bottom: 30px;
    }
  }

  .brands-item:hover {
   background-color: var(--gray-200-color);
  }

  .brands-item-logo {
    height: 90px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    padding: 0 16px;

    @media (min-width: 600px) {
      height: 160px;
    }

    img {
      width: 100%;
      max-height: 100%;
    }
  }

  .brands-item-text {
    font-size: 16px;
    font-weight: 600;
    margin: 0;
    line-height: 20px;
  }

  .brands-item-btn {
    width: 92px;
    position: relative;
    padding: 5px 24px 5px 10px;
    background-color: var(--gray-300-color);
    text-align: center;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    color: var(--black-color);
    transition: all 0.3s;
  }

  .brands-item-btn:after {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
    width: 5px;
    padding: 5px;
    background: url("/src/assets/icons/black-arrow-right.svg") no-repeat center center;
  }

  .brands-item-btn:hover:after {
    background: url("/src/assets/icons/white-arrow-right.svg") no-repeat center center;
  }

  .brands-item-btn:hover {
    color: var(--white-color);
    background-color: var(--blue-400-color);
  }
</style>