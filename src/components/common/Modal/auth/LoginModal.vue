<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="login-modal__header">
      <h2 class="login-modal__title">
        Вход
      </h2>
      <p class="login-modal__subtitle">
        В личный кабинет
      </p>
    </div>
    
    <div class="login-modal__form">
      <div class="login-modal__input-group">
        <label class="login-modal__label">Введите ваш номер телефона</label>
        <div class="login-modal__input-wrapper">
          <input 
            v-model="phone" 
            type="tel" 
            class="login-modal__input"
            :class="{ 'login-modal__input--error': hasError }"
            placeholder="+7 (___) ___-__-__"
            @input="formatPhone"
            @keydown.enter="sendCode"
          >
        </div>
        <span v-if="hasError" class="login-modal__error">Введите корректный номер телефона</span>
      </div>
      
      <button 
        class="login-modal__button" 
        :disabled="!isValidPhone || isLoading"
        @click="sendCode"
      >
        <span v-if="!isLoading">Отправить код</span>
        <span v-else class="login-modal__loader" />
      </button>
      
      <p class="login-modal__policy">
        Оставляя ваши данные, вы соглашаетесь с политикой конфиденциальности <router-link to="/privacy" class="login-modal__policy-link">
          ИП Макарова Елена Валерьевна
        </router-link>
      </p>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue';

defineOptions({
  name: 'LoginModal'
})

interface Props {
  isOpen?: boolean
}

interface Emits {
  (e: 'update:isOpen', value: boolean): void
  (e: 'onSubmit', value: string): void
}

withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<Emits>()

const phone = ref('')
const hasError = ref(false)
const isLoading = ref(false)

const isValidPhone = computed(() => {
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

const closeModal = () => {
  emit('update:isOpen', false)
}

const sendCode = async () => {
  if (!isValidPhone.value) {
    hasError.value = true
    return
  }
  
  isLoading.value = true
  try {
    console.log('sendCode', phone.value)
    // тут дёргаем api
    emit('onSubmit', phone.value)
  } finally {
    isLoading.value = false
  }
}
</script>

<style scoped>
.login-modal__header {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.login-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0;
}

.login-modal__subtitle {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 1.5;
  color: #4D4D4D;
  margin: 0;
}

.login-modal__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.login-modal__input-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.login-modal__label {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 1.21;
  color: #000000;
}

.login-modal__input-wrapper {
  width: 100%;
}

.login-modal__input {
  width: 100%;
  padding: 14px 16px;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 1.21;
  color: #000000;
  box-sizing: border-box;
  transition: border-color 0.2s;
}

.login-modal__input:focus {
  outline: none;
  border-color: #0084FF;
}

.login-modal__input--error {
  border-color: #FF3B30;
}

.login-modal__error {
  font-family: 'Inter', sans-serif;
  font-size: 12px;
  line-height: 1.21;
  color: #FF3B30;
}

.login-modal__button {
  width: 100%;
  padding: 14px;
  background: #0084FF;
  border-radius: 6px;
  border: none;
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 14px;
  line-height: 1.21;
  color: #FFFFFF;
  cursor: pointer;
  transition: background-color 0.2s;
  position: relative;
}

.login-modal__button:not(:disabled):hover {
  background: #0066CC;
}

.login-modal__button:disabled {
  background: #CCE4FF;
  cursor: not-allowed;
}

.login-modal__policy {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 12px;
  line-height: 1.21;
  color: #000000;
  margin: 0;
}

.login-modal__policy-link {
  color: #0084FF;
  text-decoration: none;
  transition: color 0.2s;
}

.login-modal__policy-link:hover {
  color: #0066CC;
  text-decoration: underline;
}

.login-modal__loader {
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 2px solid #FFFFFF;
  border-radius: 50%;
  border-top-color: transparent;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style> 