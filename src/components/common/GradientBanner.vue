<template>
  <div class="banner-container">
    <div class="text">
      <p class="title">{{title}}</p>
      <p class="subtitle">{{subtitle}}</p>
      <p class="price" v-if="price">От {{price}} ₽</p>
    </div>
    <div class="image-wrap">
      <img :src="imageSrc" alt="Banner Image" class="image" />
    </div>
  </div>
</template>

<script setup lang="ts">
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
    default: '',
  },
  imageSrc: {
    type: String,
    default: '/src/assets/icons/image-default.svg',
    required: true,
  },
});
</script>

<style scoped>
.banner-container{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  flex-wrap: wrap;
  color: var(--white-color);
  background: linear-gradient(94.51deg, #0084FF 19.39%, #B1A9F6 79.17%);
  border-radius: 20px;
  gap: 10px;
  min-height: 220px;

  @media (min-width: 768px) {
    flex-wrap: nowrap;
  }
}

.text {
  max-width: 690px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 10px;
  padding: 30px;
  text-align: left;
}

.title {
  font-weight: 700;
  font-size: 50px;
  line-height: 60px;
  margin: 0;
}

.subtitle {
  font-weight: 400;
  font-size: 18px;
  line-height: 30px;
  margin: 0;
}

.price {
  margin-top: 50px;
  font-size: 30px;
  font-weight: 700;
  margin-bottom: 0;
}

.image-wrap {
  max-width: 470px;
  max-height: 218px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: auto;
}

.image {
  object-fit: contain;
  flex-basis: auto;
  display: block;
}

@media (max-width: 1024px) {
  .title {
    font-size: 40px;
    line-height: 50px;
  }
}

@media (max-width: 768px) {
  .container {
    min-height: 404px;
  }
  .title {
    font-size: 34px;
    line-height: 30px;
  }

  .subtitle {
    font-size: 16px;
    line-height: 24px;
  }
}

</style>