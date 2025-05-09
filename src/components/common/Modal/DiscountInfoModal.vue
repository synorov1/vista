<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="discount-info-modal">
      <div class="discount-info-modal__banner">
        <span class="discount-info-modal__percent">5%</span>
        <p class="discount-info-modal__banner-amount">
          ~ 10 242 ₽ за 2024
        </p>
        <p class="discount-info-modal__banner-text">
          Накопительная скидка, за приобретение товаров в нашем магазине
        </p>
      </div>

      <div class="discount-info-modal__text">
        <h2 class="discount-info-modal__title">
          Скидка
        </h2>
      </div>

      <p class="discount-info-modal__description">
        Описание из чего складывается скидка
      </p>

      <button class="discount-info-modal__button">
        Подробнее
      </button>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import { computed } from 'vue'

defineOptions({
  name: 'DiscountInfoModal'
})

interface Props {
  isOpen?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  (e: 'update:isOpen', value: boolean): void
}>()

const modelValue = computed({
  get: () => props.isOpen,
  set: (value) => emit('update:isOpen', value)
})
</script>

<style scoped>
.discount-info-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
  width: 100%;
}
:deep(.modal__content) {
  max-width: 530px;
}
.discount-info-modal__banner {
  position: relative;
  width: 100%;
  height: 200px;
  padding: 8px 20px 20px 20px;
  background: linear-gradient(109.07deg, #0084FF 5.77%, #B1A9F6 98.72%);
  border-radius: 14px;
  color: var(--white-color);
}

.discount-info-modal__percent {
  display: block;
  font-weight: 800;
  font-size: 60px;
  line-height: 100%;
  letter-spacing: -2%;
}

.discount-info-modal__banner-text {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  margin: 0;
  letter-spacing: 0;
  margin-top: 19px;
  max-width: 260px;
}

.discount-info-modal__banner-amount {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0;
  margin: 0;
}

.discount-info-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.discount-info-modal__title {
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  text-align: center;
  color: var(--black-color);
  margin: 0;
}

.discount-info-modal__description {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: #4D4D4D;
  margin: 0;
}

.discount-info-modal__button {
  width: 100%;
  padding: 0 16px;
  background: #0084FF;
  border-radius: 6px;
  border: none;
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 14px;
  line-height: 100%;
  color: #FFFFFF;
  cursor: pointer;
  transition: background-color 0.2s;
  height: 45px;
  position: relative;
}

.discount-info-modal__button:hover {
  opacity: 0.7;
}
</style> 