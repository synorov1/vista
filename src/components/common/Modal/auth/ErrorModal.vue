<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="error-modal__content">
      <div class="error-modal__icon">
        <svg 
          width="80" 
          height="80" 
          viewBox="0 0 80 80" 
          fill="none"
        >
          <circle 
            cx="40" 
            cy="40" 
            r="40" 
            fill="#FF3B30"
          />
          <path 
            d="M52 28L28 52M28 28L52 52" 
            stroke="white" 
            stroke-width="4" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <h2 class="error-modal__title">
        Упс
      </h2>
      <p class="error-modal__text">
        {{ errorText }}
      </p>
      <button 
        class="error-modal__button" 
        @click="closeModal"
      >
        Попробовать снова
      </button>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue';

interface Props {
  isOpen?: boolean
  errorText?: string
}

interface Emits {
  (e: 'update:isOpen', value: boolean): void
  (e: 'onRetry'): void
}

withDefaults(defineProps<Props>(), {
  isOpen: false,
  errorText: 'Произошла ошибка. Попробуйте еще раз.'
})

const emit = defineEmits<Emits>()

const closeModal = () => {
  emit('update:isOpen', false)
  emit('onRetry')
}

defineOptions({
  name: 'ErrorModal'
})
</script>

<style scoped>
.error-modal__content {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 20px;
  padding: 30px;
}

.error-modal__icon {
  margin-bottom: 10px;
}

.error-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 48px;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0;
}

.error-modal__text {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  color: #4D4D4D;
  margin: 0;
}

.error-modal__button {
  width: 100%;
  padding: 14px;
  background: #0084FF;
  border-radius: 6px;
  border: none;
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: #FFFFFF;
  cursor: pointer;
  transition: background-color 0.2s;
  margin-top: 10px;
}

.error-modal__button:hover {
  background: #0066CC;
}
</style> 