<template>
  <div :class="$style.promoSection">
    <span>Сертификат / промокод:</span>
    <div :class="$style.promocode">
      <input 
        v-model="promocode" 
        type="text" 
        @input="checkPromocode"
      >
      <img
        v-if="isValidPromocode"
        :src="PromocodeIcon"
        height="20"
        width="20"
        alt="Promocode"
      >
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import PromocodeIcon from "@/assets/icons/cart/promocode.svg"

const promocode = ref('');

const isValidPromocode = computed(() => promocode.value.trim().toLowerCase() === 'jolla24');

const checkPromocode = () => {
  console.log('Промокод:', promocode.value);
};
</script>

<style module>
.promoSection {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 100%;
}

.promocode {
  display: flex;
  position: relative;
}

.promocode img {
  position: absolute;
  right: 16px;
  top: 13px;
}

.promoSection span {
  font-weight: 400;
  font-size: 14px;
  line-height: 1.21;
  color: #000000;
}

.promocode input {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 16px;
  background: #FFFFFF;
  border-radius: 6px;
  cursor: pointer;
  height: 45px;
  padding-right: 50px;
  width: 100%;
}
</style>