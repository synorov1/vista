<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="subscribe-modal">
      <div class="subscribe-modal__text">
        <h2 class="subscribe-modal__title">
          Подпишитесь<br>на наши новости
        </h2>
        <p class="subscribe-modal__description">
          И получите промокод на скидку 10%
        </p>
      </div>

      <div class="subscribe-modal__image">
        <div class="subscribe-modal__image-circle" />
        <div class="subscribe-modal__image-circle" />
        <div class="subscribe-modal__image-frame">
          <img
            src="@/assets/images/product-1.jpg"
            alt="product"
            class="subscribe-modal__image-item"
          >
        </div>
        <div class="subscribe-modal__image-frame">
          <img
            src="@/assets/images/product-2.jpg"
            alt="product"
            class="subscribe-modal__image-item"
          >
        </div>
        <div class="subscribe-modal__image-frame">
          <img
            src="@/assets/images/product-3.jpg"
            alt="product"
            class="subscribe-modal__image-item"
          >
        </div>
        <div class="subscribe-modal__promo">
          <svg
            width="14"
            height="14"
            viewBox="0 0 14 14"
            fill="none"
          >
            <path
              d="M11.6667 5.25L9.91667 1.75H4.08333L2.33333 5.25M11.6667 5.25L7 12.25M11.6667 5.25H2.33333M2.33333 5.25L7 12.25M7 12.25L8.75 8.75H5.25L7 12.25Z"
              stroke="white"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
      </div>

      <div class="subscribe-modal__form">
        <div class="subscribe-modal__input-group">
          <label class="subscribe-modal__label">Email</label>
          <div class="subscribe-modal__input">
            <input
              type="email"
              placeholder="name@name.ru"
              class="subscribe-modal__input-field"
            >
          </div>
        </div>
        <button class="subscribe-modal__button">
          Подписаться
        </button>
        <p class="subscribe-modal__policy">
          Оставляя ваши данные, вы соглашается с политикой конфиденциальности ИП Макарова Елена Валерьевна
        </p>
      </div>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import { computed } from 'vue'

defineOptions({
  name: 'SubscribeModal'
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
.subscribe-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
  width: 100%;
  padding: 30px;
}

.subscribe-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.subscribe-modal__title {
  font-weight: 700;
  font-size: 40px;
  line-height: 48px;
  letter-spacing: -0.02em;
  text-align: center;
  color: var(--black-color);
  margin: 0;
}

.subscribe-modal__description {
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  text-align: center;
  color: var(--gray-800-color);
  margin: 0;
}

.subscribe-modal__image {
  position: relative;
  width: 100%;
  height: 200px;
  border-radius: 16px;
  overflow: hidden;
}

.subscribe-modal__image-circle {
  position: absolute;
  width: 200px;
  height: 200px;
  border: 30px solid var(--white-color);
  border-radius: 50%;
  opacity: 0.1;
}

.subscribe-modal__image-circle:nth-child(1) {
  top: -100px;
  left: -100px;
}

.subscribe-modal__image-circle:nth-child(2) {
  bottom: -100px;
  right: -100px;
}

.subscribe-modal__image-frame {
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(30px);
  border: 1px solid;
  border-image: linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.3)) 1;
  border-radius: 16px;
}

.subscribe-modal__image-item {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.subscribe-modal__promo {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 4px 6px;
  background: var(--red-color);
  border-radius: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 82px;
  height: 82px;
}

.subscribe-modal__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;
}

.subscribe-modal__input-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 100%;
}

.subscribe-modal__label {
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.subscribe-modal__input {
  width: 100%;
}

.subscribe-modal__input-field {
  width: 100%;
  height: 45px;
  padding: 14px 16px;
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.subscribe-modal__button {
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

.subscribe-modal__button:hover {
  opacity: 0.7;
}

.subscribe-modal__policy {
  font-weight: 400;
  font-size: 12px;
  line-height: 15px;
  color: var(--black-color);
  margin: 0;
}
</style> 