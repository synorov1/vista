<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="success-modal__content">
      <div class="success-modal__icon">
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
            fill="#0084FF"
          />
          <path
            d="M56 32L35 53L24 42"
            stroke="white"
            stroke-width="4"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <h2 class="success-modal__title">
        Успешно!
      </h2>
      <p class="success-modal__text">
        Вы успешно вошли в личный кабинет
      </p>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue';

defineOptions({
  name: 'SuccessModal'
})

interface Props {
  isOpen?: boolean
}

interface Emits {
  (e: 'update:isOpen', value: boolean): void
  (e: 'onClose'): void
}

const props = withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<Emits>()

const closeModal = () => {
  emit('update:isOpen', false)
  emit('onClose')
}

// Auto-close after 3 seconds
onMounted(() => {
  if (props.isOpen) {
    setTimeout(() => {
      closeModal()
    }, 3000)
  }
})
</script>

<style scoped>
.success-modal__content {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 10px;
}

.success-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin-top: 20px;
  margin-bottom: 0;
}

.success-modal__text {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin-top: 0;
  margin-bottom: 30px;
}
</style> 