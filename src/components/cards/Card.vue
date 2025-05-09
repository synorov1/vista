<script setup lang="ts">
import RedLabel from "@/components/common/RedLabel.vue";
import Rating from "@/components/common/Rating.vue";
import { computed } from 'vue';

interface CardProps {
  image: string;
  title: string;
  price: number;
  oldPrice: number;
  discount?: number;
  rating: number;
  liked: boolean;
}

const props = defineProps<CardProps>();

const calculatedDiscount = computed(() => {
  if (props.discount) return props.discount;
  if (props.oldPrice && props.price) {
    return Math.round(((props.oldPrice - props.price) / props.oldPrice) * 100);
  }
  return 0;
});

const emit = defineEmits<{
  (e: 'like'): void;
}>();
</script>

<script lang="ts">
export default {
  name: 'Card'
}
</script>

<template>
  <div :class="$style.card">
    <img
      src="@/assets/images/backpack.png"
      alt="backpack"
      :class="$style.img"
    >
    <RedLabel
      v-if="price"
      :class="$style.badge"
      :price="price"
      :old-price="oldPrice"
      :discount="calculatedDiscount"
    />
    <Rating :stars="rating" :class="$style.rating" />

    <div :class="[$style.likeButton, { [$style.liked]: liked }]" @click="emit('like')">
      <svg
        width="20"
        height="20"
        viewBox="0 0 20 20"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M4.68729 3.68675C3.3048 4.31869 2.29199 5.82178 2.29199 7.61418C2.29199 9.44533 3.04134 10.8568 4.11557 12.0664C5.00093 13.0633 6.07269 13.8896 7.11793 14.6954C7.36619 14.8868 7.61295 15.0771 7.85537 15.2682C8.29372 15.6138 8.68474 15.917 9.06166 16.1373C9.43874 16.3577 9.74232 16.4583 10.0003 16.4583C10.2583 16.4583 10.5619 16.3577 10.939 16.1373C11.3159 15.917 11.7069 15.6138 12.1453 15.2682C12.3877 15.0771 12.6345 14.8868 12.8827 14.6954C13.928 13.8896 14.9997 13.0633 15.8851 12.0664C16.9593 10.8568 17.7087 9.44533 17.7087 7.61418C17.7087 5.82178 16.6958 4.31869 15.3133 3.68675C13.9702 3.07283 12.1656 3.23541 10.4507 5.01721C10.3328 5.13962 10.1702 5.20878 10.0003 5.20878C9.83041 5.20878 9.66782 5.13962 9.54999 5.01721C7.83504 3.23541 6.03038 3.07283 4.68729 3.68675ZM10.0003 3.71561C8.07362 1.99179 5.91612 1.75065 4.16762 2.54989C2.32092 3.39403 1.04199 5.35412 1.04199 7.61418C1.04199 9.83542 1.96741 11.53 3.18093 12.8964C4.15272 13.9907 5.34217 14.9066 6.39268 15.7154C6.63082 15.8988 6.86181 16.0767 7.08151 16.2498C7.50837 16.5863 7.96661 16.9452 8.43099 17.2165C8.89524 17.4878 9.42499 17.7083 10.0003 17.7083C10.5757 17.7083 11.1054 17.4878 11.5697 17.2165C12.0341 16.9452 12.4922 16.5863 12.9192 16.2498C13.1388 16.0767 13.3698 15.8988 13.608 15.7154C14.6585 14.9066 15.8479 13.9907 16.8197 12.8964C18.0332 11.53 18.9587 9.83542 18.9587 7.61418C18.9587 5.35412 17.6797 3.39403 15.833 2.54989C14.0845 1.75065 11.9271 1.99179 10.0003 3.71561Z"
          fill="black"
        />
      </svg>
    </div>
  </div>
</template>

<style module>
.card {
  display: flex;
  position: relative;
  flex-direction: column;
  justify-content: space-between;
  min-width: 139px;
  min-height: 200px;
  padding: 16px;
  background-color: #fff;
  border: 1px solid var(--gray-400-color);
  border-radius: 20px;
  box-sizing: border-box;
  width: 100%;
  
  @media (min-width: 768px) {
    min-width: 190px;
    min-height: 215px;
  }
}

.img {
  max-width: 100%;
  height: 111px;
  object-fit: contain;
  margin: 10px 0;
  flex-shrink: 0;
}

.rating {
  position: absolute;
  top: 16px;
  left: 16px;
}

.likeButton {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--white-color);
  border: none;
  border-radius: 50%;
  cursor: pointer;
  color: var(--gray-400-color);
  transition: all 0.2s;
  
  &:hover {
    color: var(--red-100-color);
  }
}

.liked {
  color: var(--red-100-color);
}

.badge {
  position: absolute;
  bottom: 16px;
  left: 16px;
}
</style>
