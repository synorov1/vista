<template>
  <div class="product-ratings-item">
    <div class="product-ratings-item__top">
      <div class="product-ratings-item__title">
        {{ props.title }}
      </div>

      <slot v-if="slots.top" name="top" />
    </div>

    <table class="product-ratings-item__table">
      <tr
        v-for="item in props.ratings"
        :key="item.name"
        class="product-ratings-item__row"
      >
        <td class="product-ratings-item__text">
          {{ item.name }}
        </td>

        <td class="product-ratings-item__line-wrap">
          <div class="product-ratings-item__line">
            <span :style="{ width: getLineWidth(item.count) }" class="product-ratings-item__line-fill" />
          </div>
        </td>

        <td class="product-ratings-item__text">
          {{ item.count.toLocaleString("ru-RU") }}
        </td>
      </tr>
    </table>
  </div>
</template>

<script lang="ts" setup>
import { useSlots } from 'vue';

interface Ratings {
  name: string;
  count: number;
}

interface Props {
  title: string;
  total: number;
  ratings: Ratings[];
}

const props = defineProps<Props>();

const slots = useSlots();

function getLineWidth(count: number): string {
  const percentage = (count / props.total) * 100;

  return `${percentage}%`;
}
</script>

<style scoped>
.product-ratings-item {
  border-radius: 16px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
  gap: 20px;
  display: flex;
  flex-direction: column;
}

.product-ratings-item__top {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.product-ratings-item__title {
  font-weight: 700;
  font-size: 20px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.product-ratings-item__row {
  vertical-align: middle;
}

.product-ratings-item__row + .product-ratings-item__row {
  margin-top: 4px;
}

.product-ratings-item__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  white-space: nowrap;
}

.product-ratings-item__line-wrap {
  width: 100%;
  padding-left: 10px;
  padding-right: 10px;
}

.product-ratings-item__line {
  flex-grow: 1;
  width: 100%;
  background-color: var(--gray-300-color);
  border-radius: 3px;
  height: 10px;
  position: relative;
}

.product-ratings-item__line-fill {
  position: absolute;
  height: 10px;
  left: 0;
  top: 0;
  border-radius: 3px;
  background-color: var(--blue-400-color);
}

@media (min-width: 768px) {
  .product-ratings-item {
    padding: 30px;
  }

  .product-ratings-item__top {
    flex-direction: row;
    justify-content: space-between;
  }
}
</style>