<template>
  <div class="product-card">
    <div class="product-image">
      <img src="@/assets/images/joola-1.jpg" alt="Product">
    </div>
    <div class="product-info">
      <h2>{{ itemData.name }}</h2>
      <div class="price-block">
        <span class="current-price">{{ formatPrice(itemData.price.current) }} ₽</span>
        <span v-if="itemData.price.old" class="old-price">{{ formatPrice(itemData.price.old) }} ₽</span>
      </div>
      <div v-if="itemData.options?.length" class="product-options">
        <div
          v-for="option in itemData.options"
          :key="option.id"
          class="option"
        >
          {{ option.name }}: <div class="value">
            {{ option.value }}
          </div>
        </div>
      </div>
      <div v-if="itemData.additional?.length" class="additional-services">
        <span>Дополнительные услуги:</span>
        <button v-for="item in itemData.additional" :key="item.id" class="service-btn" type="button">
          <svg 
            width="12" 
            height="12" 
            viewBox="0 0 12 12" 
            fill="none"
          >
            <path 
              d="M6 1V11M1 6H11" 
              stroke="white" 
              stroke-width="2" 
              stroke-linecap="round"
            />
          </svg>
          {{ itemData.name }}
        </button>
      </div>
    </div>
    <div class="actions">
      <CartItemActions v-model:quantity="quantity" :product-id="itemData.id" />
    </div>

  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { formatPrice } from "@/utils/formatPrice";
import CartItemActions from "./CartItemActions.vue";


interface Price {
  old?: number;
  current: number;
}

interface Option {
  id: number;
  name: string;
  value: string;
}

interface Additional {
  id: number;
  name: string;
  value: string;
}

interface ICartItem {
  id: number;
  name: string;
  image?: string;
  price: Price;
  options?: Option[];
  additional?: Additional[];
}

const { itemData } = defineProps<{ itemData: ICartItem }>();
const quantity = ref(1);
</script>

<style scoped>

.product-card {
  display: flex;
  gap: 20px;
}

.product-image {
  width: 100px;
  height: 100px;
  border: 1px solid #D9D9D9;
  border-radius: 14px;
  overflow: hidden;
  padding: 21px;
}

.product-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.product-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.product-info h2 {
  font-weight: 700;
  font-size: 16px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0;
}

.price-block {
  display: flex;
  align-items: center;
  gap: 10px;
}

.current-price {
  font-weight: 800;
  font-size: 16px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #0084FF;
}

.old-price {
  font-weight: 600;
  font-size: 12px;
  line-height: 1.21;
  color: #A0A0A0;
  text-decoration: line-through;
}

.product-options {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 10px;
}

.option {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 10px;
  background: #F0F0F0;
  border-radius: 30px;
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #A0A0A0;
  height: 29px;
  gap: 3px;
}

.option .value {
  color: #000;
  display: flex;
  white-space: nowrap;
}

.additional-services {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: 10px;
}

.additional-services span {
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #A0A0A0;
}


.service-btn {
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 6px 10px 6px 6px;
  background: #0084FF;
  border-radius: 30px;
  border: none;
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #FFFFFF;
  cursor: pointer;
  width: fit-content;
}




@media (max-width: 1024px) {

  .product-card {
    max-width: 596px;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
  }

  .actions {
    margin-top: 10px;
  }
}

@media (max-width: 720px) {

  .product-card {
    flex-direction: column;
    max-width: 648px;
  }

}

@media (max-width: 468px) {
  .actions {
    margin-top: 0;
  }
  
}

@media (max-width: 320px) {


  .product-card {
    gap: 16px;
  }

  .product-options {
    flex-wrap: wrap;
  }

}
</style>