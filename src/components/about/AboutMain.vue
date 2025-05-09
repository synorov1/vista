<script lang="ts" setup>
interface Props {
  image: string;
  text: string;
}

const props = defineProps<Props>();
</script>

<template>
  <section class="about-main">
    <img
      :src="props.image"
      class="about-main__image"
      alt="About image"
    >

    <div class="about-main__content">
      <h1 class="about-main__title">
        О компании
      </h1>

      <h1 class="about-main__text">
        {{ props.text }}
      </h1>
    </div>
  </section>
</template>

<style scoped>
.about-main {
  display: flex;
  flex-direction: column;
}

.about-main__image {
  display: block;
  border-radius: 16px;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 200px;
}

.about-main__content {
  display: flex;
  flex-direction: column;
  gap: 10px;
  background-color: var(--gray-200-color);
  color: var(--black-color);
  border-radius: 16px;
  padding: 16px;
  letter-spacing: -0.02em;
}

.about-main__title {
  font-weight: 800;
  font-size: 20px;
  line-height: 24px;
}

.about-main__text {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
}

@media (min-width: 768px) {
  .about-main__image {
    height: 350px;
  }

  .about-main__content {
    padding: 30px;
  }

  .about-main__title {
    font-size: 24px;
    line-height: 40px;
  }

  .about-main__text {
    font-size: 16px;
    line-height: 24px;
  }
}

@media (min-width: 1024px) {
  .about-main {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .about-main__image {
    order: 1;
    height: 450px;
  }

  .about-main__content {
    height: 100%;
  }

  .about-main__title {
    font-size: 34px;
  }

  .about-main__text {
    font-size: 18px;
    line-height: 30px;
  }
}
</style>