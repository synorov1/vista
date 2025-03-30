<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="discount-info-modal">
      <div class="discount-info-modal__banner">
        <span class="discount-info-modal__percent">5%</span>
        <p class="discount-info-modal__banner-text">
          Накопительная скидка, за приобретение товаров в нашем магазине
        </p>
        <p class="discount-info-modal__banner-amount">
          ~ 10 242 ₽ за 2024
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
  padding: 30px;
}

.discount-info-modal__banner {
  position: relative;
  width: 100%;
  padding: 30px;
  background: linear-gradient(45deg, #0084FF, #B1A9F6);
  border-radius: 14px;
  color: var(--white-color);
}

.discount-info-modal__percent {
  display: block;
  font-weight: 800;
  font-size: 60px;
  line-height: 73px;
  letter-spacing: -0.02em;
}

.discount-info-modal__banner-text {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  margin: 0;
}

.discount-info-modal__banner-amount {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
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
  line-height: 48px;
  letter-spacing: -0.02em;
  text-align: center;
  color: var(--black-color);
  margin: 0;
}

.discount-info-modal__description {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  margin: 0;
}

.discount-info-modal__button {
  width: 100%;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--blue-color);
  border: none;
  border-radius: 6px;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
  cursor: pointer;
  transition: opacity 0.2s;
}

.discount-info-modal__button:hover {
  opacity: 0.7;
}
</style> 