<template>
  <div class="product-card-info">
    <h1 class="product-card-info__title">
      {{ props.title }}
    </h1>

    <div class="product-card-info__top">
      <div class="product-card-info__ratings">
        <Star :text="props.rating" class="product-card-info__ratings-star" />

        &nbsp;- {{ props.ratings.toLocaleString('ru-RU') }} оценки
      </div>

      <YesNoButton
        :is-available="props.available"
        available-text="В наличии"
        unavailable-text="Нет в наличии"
      />
    </div>

    <div class="product-card-info__description">
      <h3 class="product-card-info__subtitle">
        Описание
      </h3>

      {{ props.text }}

      <GreyButton
        type="secondary"
        size="small"
        text="Показать ещё"
        class="product-card-info__description-button"
      >
        <template #icon>
          <span class="product-card-info__description-icon">
            <IconArrowBottom />
          </span>
        </template>
      </GreyButton>
    </div>

    <div class="product-card-info__params">
      <div
        v-for="item in props.params"
        :key="item.title"
        class="product-card-info__params-row"
      >
        <h4 class="product-card-info__subtitle">
          {{ item.title }}
        </h4>

        <ProductCardParams :list="item.list" />
      </div>
    </div>

    <button type="button" class="product-card-info__link">
      Как правильно выбрать накладку?
    </button>
  </div>
</template>

<script lang="ts" setup>
import Star from '@/components/common/Star.vue';
import YesNoButton from '~/components/common/buttons/YesNoButton.vue';
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import IconArrowBottom from '@/components/icons/IconArrowBottom.vue';
import ProductCardParams from '@/components/product/card/ProductCardParams.vue';

type ProductCardParamsProps = InstanceType<typeof ProductCardParams>["$props"];

interface ProductParams extends ProductCardParamsProps {
  title: string;
}

interface Props {
  rating: string;
  ratings: number;
  title: string;
  available: boolean;
  text: string;
  params: ProductParams[];
}

const props = defineProps<Props>();
</script>

<style scoped>
.product-card-info {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.product-card-info__title {
  font-weight: 700;
  font-size: 20px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 4px;
}

.product-card-info__top {
  display: flex;
  gap: 10px;
}

.product-card-info__ratings {
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: var(--gray-600-color);
  display: flex;
  align-items: center;
  height: 17px;
}

.product-card-info__ratings-star {
  height: 100%;
}

.product-card-info__description {
  font-weight: 400;
  font-size: 14px;
  line-height: 24px;
  color: var(--gray-800-color);
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.product-card-info__subtitle {
  font-weight: 700;
  font-size: 20px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 0;
}

.product-card-info__description-icon {
  font-size: 6px;
}

.product-card-info__description-button {
  align-self: flex-start;
}

.product-card-info__params {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.product-card-info__params-row {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.product-card-info__link {
  font-size: 14px;
  font-weight: 500;
  line-height: 100%;
  font-family: Inter;
  letter-spacing: -0.02em;
  text-align: left;
  text-decoration: underline;
  color: var(--blue-400-color);
  padding: 0;
  border: none;
  background-color: transparent;
  cursor: pointer;
}

@media (min-width: 768px) {
  .product-card-info__title {
    font-size: 26px;
  }

  .product-card-info__description {
    font-size: 16px;
  }
}
</style>