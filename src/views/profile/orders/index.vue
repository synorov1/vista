<template>
  <div :class="$style.orders">
    <div
      v-for="card in data"
      :key="card.number"
      :class="$style.item"
    >
      <div :class="$style.titleWrap">
        <p :class="$style.title">
          Заказ №{{ card.number }}
        </p>

        <span :class="$style.subtitle">
          Мои покупки
        </span>
      </div>
      <ProfileCard
        v-for="item in card.items"
        :key="item.id"
        v-bind="item"
        :class="$style.card"
      />

      <GreyButton
        type="secondary"
        size="small"
        :class="$style.delivery"
        text="Доставка в пункт выдачи"
      >
        <template #icon>
          <span :class="$style.deliveryIcon">
            <IconArrowRight />
          </span>
        </template>
      </GreyButton>
    </div>
  </div>
</template>

<script lang="ts" setup>
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import IconArrowRight from '@/components/icons/IconArrowRight.vue';
import ProfileCard from '@/components/profile/ProfileCard.vue';
import data from '@/views/profile/orders/data.json'
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Мои заказы');
</script>

<style module>
.orders {
  margin-bottom: 40px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.item {
  padding: 16px;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 0;
}

.subtitle {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
}

.delivery {
  align-self: flex-start;
}

.deliveryIcon {
  font-size: 6px;
}

@media (min-width: 768px) { 
  .orders {
    margin-bottom: 60px;
  }

  .item {
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

  .card {
    width: 822px;
  }
}
</style>