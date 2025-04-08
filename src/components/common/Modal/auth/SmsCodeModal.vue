<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="sms-modal__header">
      <h2 class="sms-modal__title">
        Вход
      </h2>
      <p class="sms-modal__subtitle">
        В личный кабинет
      </p>
    </div>
    
    <div class="sms-modal__form">
      <div class="sms-modal__input-group">
        <p class="sms-modal__text">
          Мы отправили код подтверждения
          <br>
          на {{ phone }} <button class="sms-modal__change-btn" @click="onChangePhone">
            Изменить
          </button>
        </p>
        <div class="sms-modal__input-wrapper">
          <input 
            v-model="code" 
            type="text" 
            class="sms-modal__input"
            :class="{ 'sms-modal__input--error': hasError }"
            placeholder="Код из смс"
            maxlength="4"
            @input="onCodeInput"
            @keydown.enter="submitCode"
          >
        </div>
        <span v-if="hasError" class="sms-modal__error">Неверный код</span>
        <p class="sms-modal__timer">
          Новый код можно получить через {{ timerText }} секунды
        </p>
      </div>
      
      <button 
        class="sms-modal__button" 
        :disabled="!isValidCode || isLoading"
        @click="submitCode"
      >
        <span v-if="!isLoading">Продолжить</span>
        <span v-else class="sms-modal__loader" />
      </button>
      
      <ModalPolicy/>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue';
import ModalPolicy from '@/components/ModalPolicy.vue';

defineOptions({
  name: 'SmsCodeModal'
})

interface Props {
  isOpen?: boolean
  phone: string
}

interface Emits {
  (e: 'update:isOpen', value: boolean): void
  (e: 'onSubmit', code: string): void
  (e: 'onChangePhone'): void
}

withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<Emits>()

const code = ref('')
const hasError = ref(false)
const isLoading = ref(false)
const timer = ref(321)

const isValidCode = computed(() => {
  return code.value.length === 4
})

const timerText = computed(() => {
  const minutes = Math.floor(timer.value / 60)
  const seconds = timer.value % 60
  return `${minutes}:${seconds.toString().padStart(2, '0')}`
})

const onCodeInput = () => {
  code.value = code.value.replace(/\D/g, '').slice(0, 4)
  hasError.value = false
}

const closeModal = () => {
  emit('update:isOpen', false)
}

const onChangePhone = () => {
  emit('onChangePhone')
}

const submitCode = async () => {
  if (!isValidCode.value) {
    hasError.value = true
    return
  }
  
  isLoading.value = true
  try {
    emit('onSubmit', code.value)
  } finally {
    isLoading.value = false
  }
}

// Start timer
let timerInterval: number | null = null

const startTimer = () => {
  timer.value = 321
  timerInterval = window.setInterval(() => {
    if (timer.value > 0) {
      timer.value--
    } else {
      if (timerInterval) {
        clearInterval(timerInterval)
      }
    }
  }, 1000)
}

onMounted(() => {
  startTimer()
})

onUnmounted(() => {
  if (timerInterval) {
    clearInterval(timerInterval)
  }
})
</script>

<style scoped>
.sms-modal__header {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.sms-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
}

.sms-modal__subtitle {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
}

.sms-modal__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.sms-modal__input-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.sms-modal__text {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 22px;
  letter-spacing: 0;
  color: #000000;
  margin: 0;
}

.sms-modal__change-btn {
  border: none;
  background: none;
  padding: 0;
  color: #0084FF;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 22px;
  transition: color 0.2s;
  text-decoration: underline;
}

.sms-modal__change-btn:hover {
  color: #0066CC;

}

.sms-modal__input-wrapper {
  width: 100%;
}

.sms-modal__input {
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

.sms-modal__input:focus {
  outline: none;
  border-color: #0084FF;
}

.sms-modal__input--error {
  border-color: #FF3B30;
}

.sms-modal__error {
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 100%;
  color: #FF3B30;
}

.sms-modal__timer {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 22px;
  letter-spacing: 0;
  color: #000000;
  margin: 0;
}

.sms-modal__button {
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

.sms-modal__button:not(:disabled):hover {
  background: #0066CC;
}

.sms-modal__button:disabled {
  background: #CCE4FF;
  cursor: not-allowed;
}

.sms-modal__loader {
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