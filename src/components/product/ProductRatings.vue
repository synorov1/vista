<template>
  <div class="product-ratings">
    <ProductRatingsItem
      class="product-ratings__item"
      :title="props.productRating.title"
      :total="props.productRating.total"
      :ratings="props.productRating.ratings"
    >
      <template #top>
        <div class="product-ratings__item-top">
          <Star :text="props.productRating.rating" />

          &nbsp;- {{ props.productRating.total.toLocaleString('ru-RU') }} оценки
        </div>
      </template>
    </ProductRatingsItem>
    <ProductRatingsItem
      class="product-ratings__item"
      :title="props.customerEvaluation.title"
      :total="props.customerEvaluation.total"
      :ratings="props.customerEvaluation.ratings"
    />
  </div>
</template>

<script lang="ts" setup>
import ProductRatingsItem from '@/components/product/ProductRatingsItem.vue';
import Star from '@/components/common/Star.vue';

type ProductRatingsItemProps = InstanceType<typeof ProductRatingsItem>["$props"];

interface ProductRating extends ProductRatingsItemProps {
  rating: string;
}

interface Props {
  productRating: ProductRating;
  customerEvaluation: ProductRatingsItemProps;
}

const props = defineProps<Props>();
</script>

<style scoped>
.product-ratings {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-bottom: 40px;
}

.product-ratings__item-top {
  display: flex;
  align-items: center;
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: var(--gray-600-color);
}

@media (min-width: 768px) {
  .product-ratings {
    margin-bottom: 60px;
  }
}

@media (min-width: 1024px) {
  .product-ratings {
    margin-bottom: 80px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

  .product-ratings__item {
    height: 100%;
  }
}

@media (min-width: 1440px) {
  .product-ratings {
    margin-bottom: 50px;
  }
}
</style>