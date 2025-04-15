<template>
  <BaseModal :is-open="isOpen" @close="closeModal">
    <div class="recovery-password-modal">
      <h2 class="recovery-password-modal__title">
        Введите новый пароль
      </h2>
      <div class="recovery-password-modal__form">
        <div class="recovery-password-modal__input-group">
          <label class="recovery-password-modal__label">Новый пароль</label>
          <div class="recovery-password-modal__input-wrapper">
            <input 
              v-model="password"
              :type="showPassword ? 'text' : 'password'" 
              class="recovery-password-modal__input"
              :class="{ 'error': passwordError }"
              placeholder="Введите пароль"
              @input="validatePassword"
            >
            <button 
              class="recovery-password-modal__eye-button" 
              type="button"
              @click="showPassword = !showPassword"
            >
              <img 
                :src="showPassword ? '/src/assets/icons/eye-off.svg' : '/src/assets/icons/eye.svg'" 
                alt="toggle password visibility"
              >
            </button>
          </div>
          <span v-if="passwordError" class="recovery-password-modal__error">{{ passwordError }}</span>
        </div>

        <div class="recovery-password-modal__input-group">
          <label class="recovery-password-modal__label">Повторите пароль</label>
          <div class="recovery-password-modal__input-wrapper">
            <input 
              v-model="confirmPassword"
              :type="showConfirmPassword ? 'text' : 'password'" 
              class="recovery-password-modal__input"
              :class="{ 'error': confirmPasswordError }"
              placeholder="Повторите пароль"
              @input="validateConfirmPassword"
            >
            <button 
              class="recovery-password-modal__eye-button" 
              type="button"
              @click="showConfirmPassword = !showConfirmPassword"
            >
              <img 
                :src="showConfirmPassword ? '/src/assets/icons/eye-off.svg' : '/src/assets/icons/eye.svg'" 
                alt="toggle password visibility"
              >
            </button>
          </div>
          <span v-if="confirmPasswordError" class="recovery-password-modal__error">{{ confirmPasswordError }}</span>
        </div>

        <button 
          class="recovery-password-modal__button" 
          :disabled="!isValid"
          @click="handleSubmit"
        >
          Изменить пароль
        </button>
      </div>
      <ModalPolicy />
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import ModalPolicy from '@/components/ModalPolicy.vue';

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

const password = ref('')
const confirmPassword = ref('')
const showPassword = ref(false)
const showConfirmPassword = ref(false)
const passwordError = ref('')
const confirmPasswordError = ref('')

const hasMinLength = computed(() => password.value.length >= 8)
const hasUpperCase = computed(() => /[A-Z]/.test(password.value))
const hasLowerCase = computed(() => /[a-z]/.test(password.value))
const hasNumber = computed(() => /\d/.test(password.value))

const isValid = computed(() => {
  return hasMinLength.value && 
         hasUpperCase.value && 
         hasLowerCase.value && 
         hasNumber.value && 
         !passwordError.value && 
         !confirmPasswordError.value &&
         password.value === confirmPassword.value
})

const validatePassword = () => {
  if (!hasMinLength.value) {
    passwordError.value = 'Пароль должен содержать минимум 8 символов'
  } else if (!hasUpperCase.value) {
    passwordError.value = 'Пароль должен содержать заглавную букву'
  } else if (!hasLowerCase.value) {
    passwordError.value = 'Пароль должен содержать строчную букву'
  } else if (!hasNumber.value) {
    passwordError.value = 'Пароль должен содержать цифру'
  } else {
    passwordError.value = ''
  }
  validateConfirmPassword()
}

const validateConfirmPassword = () => {
  if (confirmPassword.value && password.value !== confirmPassword.value) {
    confirmPasswordError.value = 'Пароли не совпадают'
  } else {
    confirmPasswordError.value = ''
  }
}

const handleSubmit = () => {
  if (isValid.value) {
    emit('onSubmit', password.value)
  }
}

const closeModal = () => {
  emit('update:isOpen', false)
}

defineOptions({
  name: 'RecoveryPasswordModal'
})
</script>

<style scoped>
.recovery-password-modal {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 400px;
  background: #FFFFFF;
  gap: 16px;
  border-radius: 20px;
}

.recovery-password-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.recovery-password-modal__text {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.recovery-password-modal__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;
  margin-top: 14px;
}

.recovery-password-modal__input-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.recovery-password-modal__label {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: #000000;
  text-align: left;
  letter-spacing: 0%;
}

.recovery-password-modal__input-wrapper {
  position: relative;
  width: 100%;
}

.recovery-password-modal__input {
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

.recovery-password-modal__input:focus {
  outline: none;
  border-color: #0084FF;
  background: #FFFFFF;
}

.recovery-password-modal__input.error {
  border-color: #FF3B30;
  background: #FFFFFF;
}

.recovery-password-modal__eye-button {
  position: absolute;
  right: 16px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
}

.recovery-password-modal__error {
  font-family: 'Inter', sans-serif;
  font-size: 14px;
  line-height: 100%;
  color: #FF3B30;
}

.recovery-password-modal__requirements {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-top: -8px;
}

.recovery-password-modal__requirement {
  font-family: 'Inter', sans-serif;
  font-size: 12px;
  line-height: 15px;
  color: #999999;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 8px;
}

.recovery-password-modal__requirement-icon {
  width: 12px;
  height: 12px;
  background: #CCCCCC;
  border-radius: 50%;
  flex-shrink: 0;
}

.recovery-password-modal__requirement.valid {
  color: #34C759;
}

.recovery-password-modal__requirement.valid .recovery-password-modal__requirement-icon {
  background: #34C759;
}

.recovery-password-modal__button {
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
}

.recovery-password-modal__button:hover {
  background: #0066CC;
}

.recovery-password-modal__button:disabled {
  background: #CCCCCC;
  cursor: not-allowed;
}
</style> 