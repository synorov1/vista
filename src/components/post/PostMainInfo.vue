<script lang="ts" setup>
import Bread from '@/components/common/Bread.vue';
import Date from '@/components/common/Date.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';

const props = defineProps({
  theme: {
    type: String,
    required: true,
  },
  date: {
    type: String,
    required: true,
  }
})
</script>

<template>
  <section class="post-info">
    <Bread :text="props.theme" />

    <Date class="post-info__date" :date="props.date" />

    <XSBlueButton
      class="post-info__button"
      text="Подписаться на новости"
      height="45px"
    />
  </section>
</template>

<style scoped>
.post-info {
  background-color: var(--gray-200-color);
  border-radius: 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 65px;
  padding: 10px;
}

.post-info__date {
  padding-right: 10px;
}

.post-info__button {
  display: none;
}

@media (min-width: 768px) {
  .post-info {
    justify-content: flex-start;
    gap: 10px;
  }

  .post-info__button {
    display: flex;
    margin-left: auto;
  }
}
</style>