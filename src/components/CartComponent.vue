<template>
  <div :class="$style.cart">
    <div :class="$style.cartHeader">
      <div :class="$style.cartCounter">
        <h1>Корзина</h1>
        <span :class="$style.cartCount">1 товар</span>
      </div>
    </div>

    <div :class="$style.items">
      <CartItem
        v-for="item in cartItems"
        :key="item.id"
        :item-data="item"
        :class="[$style.item, { [$style.singleItem]: cartItems.length === 1 }]"
      />
    </div>

    <div :class="$style.discount">
      <CardDiscountMsg />
    </div>

    <div :class="$style.shareCart">
      <CartShareButton />
    </div>
  </div>
</template>

<script setup lang="ts">
import CardDiscountMsg from './cart/CardDiscountMsg.vue';

import CartShareButton from './cart/CartShareButton.vue';
import CartItem from './cart/CartItem.vue';

import CartImage from "@/assets/images/joola-1.jpg"


const cartItems = [
  {
    "id": 1,
    "name": "Накладка DONIC BlueStar A1",
    "image": CartImage,
    "price": {
      "old": 20000,
      "current": 6750
    },
    options: [
      {"id": 1, "name": "Цвет", "value": "Черный"},
      {"id": 2, "name": "Размер", "value": "Max"},
    ],
    additional: [
      {"id": 1, "name": "Сборка ракетки", "value": "racket-assembly"},
    ],
  },
  {
    "id": 2,
    "name": "Накладка DONIC BlueStar A2",
    "image": CartImage,
    "price": {
      "old": 25000,
      "current": 7000
    },
    options: [
      {"id": 1, "name": "Цвет", "value": "Черный"},
      {"id": 2, "name": "Размер", "value": "Max"},
      {"id": 3, "name": "Размер512sa", "value": "Max333"},
      {"id": 4, "name": "Размерsd21", "value": "Max4545"},
      {"id": 5, "name": "Размер2312", "value": "Max6363"},
    ],
    additional: [],
  }
]
</script>

<style module>
.cart {
  padding: 30px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 20px;
  margin: 0 auto;
  width: 100%;
  position: relative;
}

.cartHeader {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 6px;
  margin-bottom: 20px;
}

.shareCart {
  display: flex;
  position: absolute;
  top: 30px;
  right: 30px;
}

.items {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.cartHeader h1 {
  font-weight: 800;
  font-size: 24px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0;
}

.cartCount {
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #A0A0A0;
}

.discount {
  margin-top: 40px;
}

@media (max-width: 1024px) {
  .cart {
    max-width: 1024px;
  }
  .discount {
    margin-top: 30px;
  }
}

@media (max-width: 720px) {
  .cart {
    max-width: 720px;
  }
}

@media (max-width: 468px) {
  .cartHeader {
    margin-bottom: 16px;
  }
  
  .cart {
    padding: 16px;
  }

  .shareCart {
    position: relative;
    top: auto;
    right: auto;
    margin-top: 16px;
    width: 100%;
  }

  .shareCart :global(.share) {
    width: 100%;
  }

  .discount {
    margin-top: 16px;
  }

  .items {
    gap: 32px;
  }

  .item {
    position: relative;
  }

  .item::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 1px;
    background: #D9D9D9;
    top: calc(100% + 16px);
  }

  .item:last-child::after {
    display: none;
  }

  .singleItem::after {
    display: none;
  }
}

@media (max-width: 320px) {
  .cart {
    max-width: 320px;
    padding: 16px;
    border-radius: 16px;
  }
}
</style> 