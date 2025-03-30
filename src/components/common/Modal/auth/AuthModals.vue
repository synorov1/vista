<template>
  <component 
    :is="currentModal" 
    v-if="currentModal"
    v-bind="modalProps"
    @update:is-open="handleClose"
    @on-submit="handleSubmit"
    @on-change-phone="handleChangePhone"
    @on-retry="handleRetry"
    @on-close="handleClose"
  />
</template>

<script setup lang="ts">
import { ref, computed, defineAsyncComponent } from 'vue'

const LoginModal = defineAsyncComponent(() => import('./LoginModal.vue'))
const SmsCodeModal = defineAsyncComponent(() => import('./SmsCodeModal.vue'))
const SuccessModal = defineAsyncComponent(() => import('./SuccessModal.vue'))
const ErrorModal = defineAsyncComponent(() => import('./ErrorModal.vue'))

interface Props {
  isOpen?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  (e: 'update:isOpen', value: boolean): void
}>()

const currentStep = ref('login')
const phone = ref('')
const errorText = ref('')

  const currentModal = computed(() => {
    switch (currentStep.value) {
      case 'login':
        return LoginModal
      case 'sms':
        return SmsCodeModal
      case 'success':
        return SuccessModal
      case 'error':
        return ErrorModal
      default:
        return null
    }
  })

  const modalProps = computed(() => {
    const baseProps = {
      isOpen: props.isOpen
    }

    switch (currentStep.value) {
      case 'sms':
        return {
          ...baseProps,
          phone: phone.value
        }
      case 'error':
        return {
          ...baseProps,
          errorText: errorText.value
        }
      default:
        return baseProps
    }
  })

  const handleSubmit = async (...args: unknown[]) => {
    const value = args[0] as string;
    try {
      if (currentStep.value === 'login') {
        phone.value = value
        currentStep.value = 'sms'
      } else if (currentStep.value === 'sms') {
        await new Promise(resolve => setTimeout(resolve, 1000))
        
        if (value === '1234') {
          currentStep.value = 'success'
        } else {
          errorText.value = 'Неверный код подтверждения'
          currentStep.value = 'error'
        }
      }
    } catch (error) {
      errorText.value = 'Произошла ошибка. Попробуйте еще раз.'
      currentStep.value = 'error'
    }
  }

  const handleChangePhone = () => {
    currentStep.value = 'login'
  }

  const handleRetry = () => {
    currentStep.value = currentStep.value === 'error' ? 'sms' : 'login'
  }

  const handleClose = () => {
    if (currentStep.value === 'success') {
      emit('update:isOpen', false)
    }
    // Сброс состояния при закрытии
    setTimeout(() => {
      currentStep.value = 'login'
      phone.value = ''
      errorText.value = ''
    }, 300)
  }

defineOptions({
  name: 'AuthModals'
})
</script> 