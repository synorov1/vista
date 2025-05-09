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
  <div :class="$style.history">
    <div
      v-for="(card, index) in data"
      :key="index"
      :class="$style.item"
    >
      <ProfileCard
        v-for="item in card.items"
        :key="item.id"
        v-bind="item"
        :class="$style.card"
      />

      <div :class="$style.buttonWrap">
        <BlackButton
          height="45px"
          :class="[$style.button, $style.buttonReview]"
          text="Оставить отзыв"
        />

        <XSBlueButton
          text="Повторить заказ"
          height="45px"
          :class="$style.button"
        />

        <GreyButton
          height="45px"
          text="Подробнее о товаре"
          type="secondary"
          :class="$style.button"
        />
      </div>
    </div>
  </div>
</template>

<style module>
.history {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.item {
  padding: 16px;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.buttonWrap {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.button {
  width: 100%;
}

.buttonReview {
  margin-bottom: 10px;
}

@media (min-width: 768px) { 
  .history {
    margin-bottom: 60px;
  }

  .item {
    padding: 30px;
    gap: 20px;
  }

  .buttonWrap {
    flex-direction: row;
  }

  .button {
    width: auto;
  }

  .buttonReview {
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

  .card {
    width: 822px;
  }
}
</style>