<script lang="ts" setup>
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import IconArrowRight from '@/components/icons/IconArrowRight.vue';
import ProfileCard from '@/components/profile/ProfileCard.vue';
import data from '@/views/profile/orders/data.json'
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Мои заказы');
</script>

<template>
  <div class="orders">
    <div
      v-for="card in data"
      :key="card.number"
      class="orders__item"
    >
      <div class="orders__title-wrap">
        <p class="orders__title">
          Заказ №{{ card.number }}
        </p>

        <span class="orders__subtitle">
          Мои покупки
        </span>
      </div>
      <ProfileCard
        v-for="item in card.items"
        :key="item.id"
        v-bind="item"
        class="orders__card"
      />

      <GreyButton
        type="secondary"
        size="small"
        class="orders__delivery"
        text="Доставка в пункт выдачи"
      >
        <template #icon>
          <span class="orders__delivery-icon">
            <IconArrowRight />
          </span>
        </template>
      </GreyButton>
    </div>
  </div>
</template>

<style scoped>
.orders {
  margin-bottom: 40px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.orders__item {
  padding: 16px;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.orders__title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
    letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 0;
}

.orders__subtitle {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
}

.orders__delivery {
  align-self: flex-start;
}

.orders__delivery-icon {
  font-size: 6px;
}

@media (min-width: 768px) { 
  .orders {
    margin-bottom: 60px;
  }

  .orders__item {
    padding: 30px;
    gap: 20px;
  }
}

@media (min-width: 1440px) {
  .orders {
    margin-bottom: 80px;
  }
}

@media (min-width: 1440px) {
  .orders {
    align-items: flex-start;
    margin-bottom: 100px;
  }

  .orders__card {
    width: 822px;
  }
}
</style>