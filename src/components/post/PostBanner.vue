<script lang="ts" setup>
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
  image: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <section class="post-banner">
    <div class="post-banner__content">
      <h3 class="post-banner__title">
        {{ props.title }}
      </h3>

      <p class="post-banner__text">
        {{ props.text }}
      </p>
    </div>

    <img
      :src="props.image"
      class="post-banner__image"
      alt="Banner image"
    >
  </section>
</template>

<style scoped>
.post-banner {
  width: 100%;
  border-radius: 16px;
  background-color: #8CFF63;
  padding-top: 30px;
  text-align: center;
  color: var(--black-color);
  display: flex;
  flex-direction: column;
}

.post-banner__content {
  padding-left: 30px;
  padding-right: 30px;
  margin-bottom: 20px;
}

.post-banner__title {
  font-size: 24px;
  font-weight: 800;
  line-height: 29px;
  letter-spacing: -0.02em;
  margin-bottom: 10px;
  padding-left: 30px;
  padding-right: 30px;
}

.post-banner__text {
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
  margin-bottom: 20px;

}

.post-banner__image {
  margin-top: auto;
  width: 100%;
  display: block;
  object-fit: contain;
  height: 200px;
}

@media (min-width: 768px) {
  .post-banner__content {
    padding-left: 74px;
    padding-right: 74px;
    margin-bottom: 30px;
  }

  .post-banner__title  {
    font-size: 30px;
    line-height: 36px;
  }

  .post-banner__image {
    height: 300px;
    object-fit: cover;
  }
}

@media (min-width: 1440px) {
  .post-banner__content {
    padding-left: 30px;
    padding-right: 30px;
    margin-bottom: 37px;
  }
}
</style>