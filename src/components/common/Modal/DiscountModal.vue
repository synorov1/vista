<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="discount-modal">
      <div class="discount-modal__text">
        <h2 class="discount-modal__title">
          Получите скидку<br><span>10%</span> на товар
        </h2>
        <p class="discount-modal__description">
          Уникальное предложение для любимого клиента
        </p>
      </div>

      <div class="discount-modal__image">
        <img
          src="@/assets/images/discount-1.png"
          alt="joola"
          class="discount-modal__image-item img-left"
        >
        <img
          src="@/assets/images/discount-2.png"
          alt="joola"
          class="discount-modal__image-item img-right"
        >
        <div class="discount-modal__promo">
          <span>JOOLA</span>
        </div>
      </div>

      <button class="discount-modal__button">
        Получить на почту
      </button>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import { computed } from 'vue'

defineOptions({
  name: 'DiscountModal'
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
.discount-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
  width: 100%;
}
:deep(.modal__content) {
  max-width: 530px;
}
.discount-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.discount-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}
.discount-modal__title span {
  color: #0084FF
}
.discount-modal__description {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.discount-modal__image {
  position: relative;
  width: 100%;
  height: 300px;
  border-radius: 16px;
  overflow: hidden;
  margin-top: 14px;
  background: #0084FF;
}

.discount-modal__image-item {
  position: absolute;
  object-fit: contain;
}

.discount-modal__image-item:nth-child(2) {
  left: 0;
}

.discount-modal__image-item:nth-child(2) {
  left: 137px;
  bottom: 0;
}

.discount-modal__promo {
  position: absolute;
  bottom: 20px;
  left: 20px;
  padding: 0 14px;
  background: #FF4245;
  border-radius: 100px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.discount-modal__promo span {
  font-weight: 600;
  font-size: 34px;
  line-height: 100%;
  color: var(--white-color);
}

.discount-modal__button {
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
  margin-top: 14px;
}

.discount-modal__button:hover {
  opacity: 0.7;
}
</style> 