<script lang="ts" setup>
import BlackButton from '@/components/common/Buttons/BlackButton.vue';
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import ProfileCard from '@/components/profile/ProfileCard.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import data from '@/views/profile/history/data.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('История просмотров');
</script>

<template>
  <div class="history">
    <div
      v-for="(card, index) in data"
      :key="index"
      class="history__item"
    >
      <ProfileCard
        v-for="item in card.items"
        :key="item.id"
        v-bind="item"
        class="history__card"
      />

      <div class="history__button-wrap">
        <BlackButton
          height="45px"
          class="history__button history__button_review"
          text="Оставить отзыв"
        />

        <XSBlueButton
          text="Повторить заказ"
          height="45px"
          class="history__button"
        />

        <GreyButton
          height="45px"
          text="Подробнее о товаре"
          type="secondary"
          class="history__button"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
.history {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.history__item {
  padding: 16px;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.history__button-wrap {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.history__button {
  width: 100%;
}

.history__button_review {
  margin-bottom: 10px;
}

@media (min-width: 768px) { 
  .history {
    margin-bottom: 60px;
  }

  .history__item {
    padding: 30px;
    gap: 20px;
  }

  .history__button-wrap {
    flex-direction: row;
  }

  .history__button {
    width: auto;
  }

  .history__button_review {
    margin-bottom: 0;
    margin-right: auto;
    width: 228px;
  }
}

@media (min-width: 1024px) {  
  .history {
    margin-bottom: 80px;
  }
}

@media (min-width: 1024px) {  
  .history {
    align-items: flex-start;
    margin-bottom: 100px;
  }

  .history__card {
    width: 822px;
  }
}
</style>