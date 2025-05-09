<script lang="ts" setup>
interface Props {
  text: string;
  images: string[];
}

const props = defineProps<Props>();
</script>

<template>
  <section class="contacts-scheme">
    <h2 class="contacts-scheme__title">
      Схема проезда
    </h2>

    <p class="contacts-scheme__text" v-html="props.text" />

    <div v-if="props.images.length > 0" class="contacts-scheme__image-wrapper">
      <img
        v-for="(image, index) in props.images"
        :key="index"
        :src="image"
        class="contacts-scheme__image"
        alt="Contacts scheme image"
      >
    </div>
  </section>
</template>

<style scoped>
.contacts-scheme {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.contacts-scheme__title {
  font-weight: 800;
  font-size: 34px;
  line-height: 41px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 0;
}

.contacts-scheme__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  margin-bottom: 0;
}

.contacts-scheme__image-wrapper {
  display: grid;
  grid-template-columns: 1fr;
  gap: 30px;
}

.contacts-scheme__image {
  display: block;
  height: 250px;
  width: 100%;
  object-fit: cover;
  object-position: center;
  overflow: hidden;
  border-radius: 16px;
}
@media (min-width: 768px) {
  .contacts-scheme__image-wrapper {
    grid-template-columns: 1fr 1fr;
  }

  .contacts-scheme__image {
    height: 316px;
  }
}
</style>