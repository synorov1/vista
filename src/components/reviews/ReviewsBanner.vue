<template>
  <div :class="$style.bannerContainer">
    <div :class="$style.text">
      <p :class="$style.title">
        {{ title }}
      </p>
      <p :class="$style.subtitle">
        {{ subtitle }}
      </p>
    </div>
    <div :class="$style.imageWrap">
      <img
        :src="imageSrc"
        alt="Banner Image"
        :class="$style.image"
      >
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
    default: '',
  },
  imageSrc: {
    type: String,
    default: '/src/assets/icons/image-default.svg',
  },
});
</script>

<style module>
.bannerContainer {
  display: flex;
  justify-content: space-between;
  color: var(--white-color);
  background: linear-gradient(94.51deg, #0084FF 19.39%, #B1A9F6 79.17%);
  border-radius: 20px;
  gap: 10px;
  height: 220px;
}

.text {
  max-width: 690px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 10px;
  padding: 30px 0 30px 30px;
  text-align: left;
  width: 100%;
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
  letter-spacing: -2%;
}

.imageWrap {
  display: flex;
  justify-content: center;
  align-items: center;
  flex: 1;
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

  .text {
    max-width: 674px;
  }
}

@media (max-width: 990px) {
  .text {
    max-width: 442px;
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

@media (max-width: 767px) {
  .bannerContainer {
    height: 404px;
    flex-direction: column;
  }
  .title {
    font-size: 30px;
  }
  .text {
    padding: 16px 16px 0 16px;
    flex-direction: column;
  }

  .imageWrap {
    display: flex;
    order: 3;
  }
}
</style>