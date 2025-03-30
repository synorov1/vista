<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="recovery-phone-modal">
      <h2 class="recovery-phone-modal__title">
        Изменить пароль
      </h2>
      <p class="recovery-phone-modal__text">
        В личный кабинет
      </p>
      <div class="recovery-phone-modal__form">
        <div class="recovery-phone-modal__input-group">
          <label class="recovery-phone-modal__label">Введите ваш номер телефона</label>
          <input 
            v-model="phone"
            type="tel" 
            class="recovery-phone-modal__input"
            :class="{ 'error': hasError }"
            placeholder="+7 (___) ___-__-__"
            @input="formatPhone"
          >
          <span v-if="hasError" class="recovery-phone-modal__error">Введите корректный номер телефона</span>
        </div>
        <button 
          class="recovery-phone-modal__button" 
          :disabled="!isValid"
          @click="handleSubmit"
        >
          Отправить код
        </button>
      </div>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue'

interface Props {
  isOpen?: boolean
}

withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  (e: 'update:isOpen', value: boolean): void
  (e: 'onSubmit', value: string): void
}>()

const phone = ref('')
const hasError = ref(false)

const isValid = computed(() => {
  const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/
  return phoneRegex.test(phone.value)
})

const formatPhone = (event: Event) => {
  const input = event.target as HTMLInputElement
  let value = input.value.replace(/\D/g, '')
  
  if (value.length > 0 && value[0] !== '7') {
    value = '7' + value
  }
  
  let formattedPhone = ''
  if (value.length > 0) {
    formattedPhone = '+7 '
    if (value.length > 1) {
      formattedPhone += `(${value.slice(1, 4)}`
    }
    if (value.length > 4) {
      formattedPhone += `) ${value.slice(4, 7)}`
    }
    if (value.length > 7) {
      formattedPhone += `-${value.slice(7, 9)}`
    }
    if (value.length > 9) {
      formattedPhone += `-${value.slice(9, 11)}`
    }
  }
  
  phone.value = formattedPhone
  hasError.value = false
}

const handleSubmit = () => {
  if (isValid.value) {
    emit('onSubmit', phone.value)
  } else {
    hasError.value = true
  }
}

const closeModal = () => {
  emit('update:isOpen', false)
}

defineOptions({
  name: 'RecoveryPhoneModal'
})
</script>

<style scoped>
.recovery-phone-modal {
  display: flex;
  flex-direction: column;
  padding: 32px;
  width: 100%;
  max-width: 400px;
  background: #FFFFFF;
  border-radius: 16px;
}

.recovery-phone-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 32px;
  line-height: 39px;
  color: #000000;
  margin: 0 0 16px;
}

.recovery-phone-modal__text {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: #4D4D4D;
  margin: 0 0 32px;
}

.recovery-phone-modal__form {
  display: flex;
  flex-direction: column;
  gap: 24px;
  width: 100%;
}

.recovery-phone-modal__input-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.recovery-phone-modal__label {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 14px;
  line-height: 17px;
  color: #000000;
  text-align: left;
}

.recovery-phone-modal__input {
  width: 100%;
  padding: 16px;
  background: #F5F5F5;
  border: 1px solid transparent;
  border-radius: 8px;
  font-family: 'Inter', sans-serif;
  font-size: 16px;
  line-height: 19px;
  color: #000000;
  transition: all 0.2s;
}

.recovery-phone-modal__input:focus {
  outline: none;
  border-color: #0084FF;
  background: #FFFFFF;
}

.recovery-phone-modal__input.error {
  border-color: #FF3B30;
  background: #FFFFFF;
}

.recovery-phone-modal__error {
  font-family: 'Inter', sans-serif;
  font-size: 12px;
  line-height: 15px;
  color: #FF3B30;
  text-align: left;
}

.recovery-phone-modal__button {
  width: 100%;
  padding: 16px;
  background: #0084FF;
  border-radius: 8px;
  border: none;
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 16px;
  line-height: 19px;
  color: #FFFFFF;
  cursor: pointer;
  transition: background-color 0.2s;
}

.recovery-phone-modal__button:hover {
  background: #0066CC;
}

.recovery-phone-modal__button:disabled {
  background: #CCCCCC;
  cursor: not-allowed;
}
</style> 