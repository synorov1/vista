<template>
  <div class="product-controls">
    <div class="quantity-controls">
      <button class="control-btn remove" @click="decreaseQuantity">
        -
      </button>
      <div class="quantity">
        {{ quantity }}
      </div> 
      <button class="control-btn add" @click="increaseQuantity">
        +
      </button>
    </div>
    <div class="action-buttons">
      <button class="icon-btn" type="button">
        <img
          :src="LikeIcon"
          height="20"
          width="20"
          alt="Action"
        >
      </button>
      <button class="icon-btn" type="button">
        <img
          :src="TrashIcon"
          height="20"
          width="20"
          alt="Action"
        >
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';
import LikeIcon from "@/assets/icons/cart/Like.svg"
import TrashIcon from "@/assets/icons/cart/trash.svg"

const props = defineProps<{ productId: number; quantity: number }>();
const emit = defineEmits<{ (event: 'update:quantity', value: number): void }>();

const increaseQuantity = () => emit('update:quantity', props.quantity + 1);
const decreaseQuantity = () => {
  if (props.quantity > 1) emit('update:quantity', props.quantity - 1);
};

</script>



<style scoped>

.product-controls {
  display: flex;
  justify-content: center;
  gap: 50px;
}

.quantity-controls {
  display: flex;
  align-items: center;
}

.quantity {
  width: 35px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.control-btn {
  width: 32px;
  height: 32px;
  background: #F0F0F0;
  border-radius: 12px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  color: #A0A0A0;
  cursor: pointer;
}

.add {
  color: #000;
}
.quantity-controls span {
  font-weight: 500;
  font-size: 20px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0 10px;
}

.action-buttons {
  display: flex;
  align-items: center;
  gap: 10px;
}

.icon-btn {
  width: 32px;
  height: 32px;
  background: #F0F0F0;
  border-radius: 12px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}


@media (max-width: 720px) {


.product-controls {
  flex-direction: row;
  justify-content: space-between;
  gap: 20px;
}
}

@media (max-width: 468px) {
  .product-controls {
  gap: 50px;
}
}

</style>