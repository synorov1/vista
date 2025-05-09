<script lang="ts" setup>
import IconImageEmpty from '@/components/icons/IconImageEmpty.vue';

interface Props {
  name: string;
  description: string;
  image?: string;
  phone: string;
  email: string;
}

const props = defineProps<Props>();
</script>

<template>
  <div class="about-team-card">
    <div class="about-team-card__image-wrap">
      <img
        v-if="props.image"
        :src="props.image"
        alt="People image"
        class="about-team-card__image"
      >

      <IconImageEmpty v-else />
    </div>

    <div class="about-team-card__item">
      <span class="about-team-card__name">{{ props.name }}</span>
  
      <span>{{ props.description }}</span>
    </div>

    <div class="about-team-card__item">
      <div class="about-team-card__social">
        <span>Телефон</span>

        <span class="about-team-card__social-text">{{ props.phone }}</span>
      </div>

      <div class="about-team-card__social">
        <span>Email</span>

        <span class="about-team-card__social-text">{{ props.email }}</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.about-team-card {
  padding: 20px;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  display: flex;
  flex-direction: column;
  gap: 16px;
  color: var(--gray-600-color);
  font-size: 14px;
  line-height: 17px;
  height: 100%;
}

.about-team-card__image-wrap {
  background-color: #E4E4E4;
  border-radius: 50%;
  overflow: hidden;
  width: 90px;
  height: 90px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;
}

.about-team-card__image {
  display: block;
  object-fit: contain;
  width: 100%;
  height: 100%;
}

.about-team-card__item {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.about-team-card__item:last-child {
  margin-top: auto;
}

.about-team-card__name {
  font-weight: 700;
  font-size: 16px;
  line-height: 19px;
  color: var(--black-color);
}

.about-team-card__social {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.about-team-card__social-text {
  font-weight: 700;
  font-size: 13px;
  line-height: 16px;
  color: var(--black-color);
}
</style>