<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="question-modal">
      <div class="question-modal__header">
        <h2 class="question-modal__title">
          Задать вопрос
        </h2>
        <p class="question-modal__subtitle">
          Оставьте ваши данные, наш менеджер изучит ваш вопрос и перезвонит или напишет с решением
        </p>
      </div>

      <div class="question-modal__form">
        <div class="question-modal__input-group">
          <label class="question-modal__label">Введите ваш номер телефона</label>
          <input 
            v-model="phone"
            type="tel" 
            class="question-modal__input"
            :class="{ 'error': errors.phone }"
            placeholder="+7 (___) ___-__-__"
            @input="formatPhone"
          >
          <span v-if="errors.phone" class="question-modal__error">{{ errors.phone }}</span>
        </div>

        <div class="question-modal__input-group">
          <label class="question-modal__label">Email</label>
          <input 
            v-model="email"
            type="email" 
            class="question-modal__input"
            :class="{ 'error': errors.email }"
            placeholder="name@name.ru"
            @input="validateEmail"
          >
          <span v-if="errors.email" class="question-modal__error">{{ errors.email }}</span>
        </div>

        <div class="question-modal__input-group">
          <label class="question-modal__label">Ваш вопрос</label>
          <textarea 
            v-model="question"
            class="question-modal__textarea"
            :class="{ 'error': errors.question }"
            placeholder="Например сколько нужно купить мячей"
            @input="validateQuestion"
          />
          <span v-if="errors.question" class="question-modal__error">{{ errors.question }}</span>
        </div>

        <button 
          class="question-modal__button" 
          :disabled="!isValid || isLoading"
          @click="handleSubmit"
        >
          <span v-if="!isLoading">Отправить</span>
          <span v-else class="question-modal__loader" />
        </button>

        <ModalPolicy/>
      </div>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue';
import ModalPolicy from '@/components/ModalPolicy.vue';

defineOptions({
  name: 'QuestionModal'
})

interface Props {
  isOpen?: boolean
}

interface Emits {
  (e: 'update:isOpen', value: boolean): void
  (e: 'onSubmit', data: { phone: string; email: string; question: string }): void
}

withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<Emits>()

const phone = ref('')
const email = ref('')
const question = ref('')
const isLoading = ref(false)
const errors = ref({
  phone: '',
  email: '',
  question: ''
})

const isValid = computed(() => {
  const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  
  return phoneRegex.test(phone.value) &&
         emailRegex.test(email.value) &&
         question.value.length >= 10 &&
         !errors.value.phone &&
         !errors.value.email &&
         !errors.value.question
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
  validatePhone()
}

const validatePhone = () => {
  const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/
  errors.value.phone = phoneRegex.test(phone.value) ? '' : 'Введите корректный номер телефона'
}

const validateEmail = () => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  errors.value.email = emailRegex.test(email.value) ? '' : 'Введите корректный email'
}

const validateQuestion = () => {
  errors.value.question = question.value.length >= 10 ? '' : 'Вопрос должен содержать минимум 10 символов'
}

const handleSubmit = async () => {
  if (!isValid.value) {
    validatePhone()
    validateEmail()
    validateQuestion()
    return
  }
  
  isLoading.value = true
  try {
    emit('onSubmit', {
      phone: phone.value,
      email: email.value,
      question: question.value
    })
  } finally {
    isLoading.value = false
  }
}

const closeModal = () => {
  emit('update:isOpen', false)
  // Сброс формы
  phone.value = ''
  email.value = ''
  question.value = ''
  errors.value = {
    phone: '',
    email: '',
    question: ''
  }
}
</script>

<style scoped>
.question-modal {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 400px;
  background: #FFFFFF;
  border-radius: 20px;
  gap: 16px;
}

.question-modal__header {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  text-align: center;
}

.question-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.question-modal__subtitle {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.question-modal__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-top: 14px;
}

.question-modal__input-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.question-modal__label {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: #000000;
  text-align: left;
  letter-spacing: 0%;
}

.question-modal__input {
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

.question-modal__textarea {
  width: 100%;
  padding: 14px 16px;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 100%;
  font-weight: 400;
  color: #000000;
  background: #FFFFFF;
  box-sizing: border-box;
  transition: border-color 0.2s;
}

.question-modal__textarea {
  min-height: 180px;
  resize: vertical;
}

.question-modal__input:focus,
.question-modal__textarea:focus {
  outline: none;
  border-color: #0084FF;
}

.question-modal__input.error,
.question-modal__textarea.error {
  border-color: #FF3B30;
}

.question-modal__error {
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 100%;
  color: #FF3B30;
}

.question-modal__button {
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

.question-modal__button:not(:disabled):hover {
  background: #0066CC;
}

.question-modal__button:disabled {
  background: #CCE4FF;
  cursor: not-allowed;
}

.question-modal__loader {
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