<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="discount-modal">
      <div class="discount-modal__text">
        <h2 class="discount-modal__title">
          Получите скидку<br>10% на товар
        </h2>
        <p class="discount-modal__description">
          Уникальное предложение для любимого клиента
        </p>
      </div>

      <div class="discount-modal__image">
        <img
          src="@/assets/images/joola-1.jpg"
          alt="joola"
          class="discount-modal__image-item"
        >
        <img
          src="@/assets/images/joola-2.jpg"
          alt="joola"
          class="discount-modal__image-item"
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
  gap: 30px;
  width: 100%;
  padding: 30px;
}

.discount-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.discount-modal__title {
  font-weight: 700;
  font-size: 40px;
  line-height: 48px;
  letter-spacing: -0.02em;
  text-align: center;
  color: var(--black-color);
  margin: 0;
}

.discount-modal__description {
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  text-align: center;
  color: var(--gray-800-color);
  margin: 0;
}

.discount-modal__image {
  position: relative;
  width: 100%;
  height: 200px;
  border-radius: 16px;
  overflow: hidden;
}

.discount-modal__image-item {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.discount-modal__image-item:nth-child(2) {
  opacity: 0.5;
}

.discount-modal__promo {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 17px 14px;
  background: var(--red-color);
  border-radius: 100px;
}

.discount-modal__promo span {
  font-weight: 600;
  font-size: 34px;
  line-height: 41px;
  color: var(--white-color);
}

.discount-modal__button {
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

.discount-modal__button:hover {
  opacity: 0.7;
}
</style> 