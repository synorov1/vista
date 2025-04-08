<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="subscribe-modal">
      <div class="subscribe-modal__text">
        <h2 class="subscribe-modal__title">
          Подпишитесь<br>на наши новости
        </h2>
        <p class="subscribe-modal__description">
          И получите промокод <span>на скидку 10%</span>
        </p>
      </div>

      <div class="subscribe-modal__image">
        <div class="subscribe-modal__image-frame">
          <img
            src="@/assets/images/subscribe.png"
            alt="product"
            class="subscribe-modal__image-item"
          >
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
        <div class="policy">
          <ModalPolicy/>

        </div>
      </div>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import ModalPolicy from '@/components/ModalPolicy.vue';
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
  gap: 16px;
  width: 100%;
}
:deep(.modal__content) {
  max-width: 530px;
}
.subscribe-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.subscribe-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.subscribe-modal__description {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}
.subscribe-modal__description span {
  color: #0084FF
}
.subscribe-modal__image {
  position: relative;
  width: 100%;
  height: 300px;
  border-radius: 16px;
  overflow: hidden;
  margin-top: 14px;
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
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: #000000;
  text-align: left;
  letter-spacing: 0%;
}

.subscribe-modal__input {
  width: 100%;
}

.subscribe-modal__input-field {
  width: 100%;
  padding: 0 16px;
  background: #fff;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 100%;
  color: #000000;
  transition: all 0.2s;
  padding-right: 48px;
  height: 45px;
}
.subscribe-modal__input-field:focus {
  outline: none;
  border-color: #0084FF;
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

.policy {
  max-width: 350px;
}
</style> 