<script lang="ts" setup>
interface Card {
  title: string;
  text: string;
}

interface Props {
  fistImages: string[];
  secondImages: string[];
  cards: Card[];
}

const props = defineProps<Props>();
</script>

<template>
  <div class="about-advantage">
    <div class="about-advantage__image-wrap">
      <div
        v-for="image in props.fistImages"
        :key="image"
        class="about-advantage__image-container"
      >
        <img
          :src="image"
          alt="About advantage image"
          class="about-advantage__image"
        >
      </div>
    </div>

    <div class="about-advantage__card-wrap">
      <div
        v-for="(card, index) in props.cards"
        :key="index"
        class="about-advantage__card"
      >
        <div class="about-advantage__card-title">
          {{ card.title }}
        </div>

        <span v-html="card.text" />
      </div>
    </div>
  
    <div class="about-advantage__image-wrap">
      <div
        v-for="image in props.secondImages"
        :key="image"
        class="about-advantage__image-container"
      >
        <img
          :src="image"
          alt="About advantage image"
          class="about-advantage__image"
        >
      </div>
    </div>
  </div>
</template>

<style scoped>
.about-advantage {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.about-advantage__image-wrap {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.about-advantage__image-container {
  height: 250px;
}

.about-advantage__image {
  display: block;
  border-radius: 16px;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 100%;
}

.about-advantage__card-wrap {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.about-advantage__card {
  border-radius: 16px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
  font-size: 16px;
  line-height: 24px;
}

.about-advantage__card-title {
  font-weight: 800;
  font-size: 30px;
  line-height: 36px;
  letter-spacing: -0.02em;
  color: var(--blue-400-color);
}

@media (min-width: 768px) {
  .about-advantage__image-wrap,
  .about-advantage__card-wrap {
    flex-direction: row;
    flex-wrap: wrap;
  }

  .about-advantage__card-wrap {
    gap: 30px;
  }

  .about-advantage__image-container {
    height: 316px;
    flex: 1 1 calc(50% - 15px);
  }

  .about-advantage__image-container:nth-child(3n) {
    flex-basis: 100%;
  }

  .about-advantage__card {
    flex: 1 1 calc(50% - 15px);
    padding: 30px;
  }

  .about-advantage__card-title {
    font-size: 40px;
    line-height: 48px;
  }
}

@media (min-width: 1024px) {
  .about-advantage__image-wrap,
  .about-advantage__card-wrap  {
    flex-wrap: nowrap;
  }

  .about-advantage__image-container:nth-child(3n),
  .about-advantage__image-container,
  .about-advantage__card {
    flex: 1;
  }
}

@media (min-width: 1440px) {
  .about-advantage__card-title {
    font-size: 50px;
    line-height: 61px;
  }
}
</style>