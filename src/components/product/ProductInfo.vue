<template>
  <div class="product-info">
    <TitleWithButton
      title="Подробнее о товаре"
      button-text="Задать вопрос"
      :on-button-click="openQuestionModal"
    />

    <p class="product-info__text" v-html="props.text" />

    <div class="product-info__specifications">
      <h3 class="product-info__title">
        Характеристики производителя
      </h3>

      <div
        v-for="item in props.list"
        :key="item.title"
        class="product-info__specifications-row"
      >
        <div class="product-info__specifications-item">
          <strong>{{ item.title }}</strong>
        </div>
        <div class="product-info__specifications-item">
          {{ item.text }}
        </div>
      </div>
    </div>

    <div class="product-info__price">
      <div class="product-info__price-current">
        {{ price }} ₽
        <span class="product-info__price-discount" @click="openDiscountInfoModal">-5%</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import TitleWithButton from "@/components/common/TitleWithButton.vue"
import { useQuestionModal, useDiscountInfoModal } from '@/composables/useModal'

interface ProductInfoList {
  title: string
  text: string
}

interface Props {
  text: string
  list: ProductInfoList[]
  price: number
}

const props = defineProps<Props>()
const { openQuestionModal } = useQuestionModal()
const { openDiscountInfoModal } = useDiscountInfoModal()
</script>

<style scoped>
.product-info {
  display: flex;
  flex-direction: column;
  gap: 30px;
  margin-bottom: 40px;
}

.product-info__text {
  color: var(--gray-800-color);
  margin-bottom: 0;
  font-weight: 400;
  font-size: 14px;
  line-height: 24px;
}

.product-info__specifications {
  display: flex;
  flex-direction: column;
}

.product-info__title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 16px;
}

.product-info__specifications-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
}

.product-info__specifications-item {
  border: 1px solid var(--gray-400-color);
  padding: 14px 30px;
  border-radius: 6px;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
}

.product-info__price {
  display: flex;
  justify-content: flex-end;
}

.product-info__price-current {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.product-info__price-discount {
  font-size: 14px;
  line-height: 17px;
  color: var(--red-color);
  margin-left: 10px;
  cursor: pointer;
}

@media (min-width: 768px) {
  .product-info {
    margin-bottom: 60px;
  }

  .product-info__text {
    font-size: 16px;
    line-height: 24px;
  }

  .product-info__title {
    font-size: 26px;
    line-height: 31px;
  }
}

@media (min-width: 1024px) {
  .product-info {
    margin-bottom: 80px;
  }
}
</style>