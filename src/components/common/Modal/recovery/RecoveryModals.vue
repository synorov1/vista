<template>
  <component 
    :is="currentModal" 
    v-if="currentModal"
    v-bind="modalProps"
    @update:is-open="handleClose"
    @on-submit="handleSubmit"
    @on-retry="handleRetry"
  />
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import RecoveryPhoneModal from './RecoveryPhoneModal.vue'
import RecoveryPasswordModal from './RecoveryPasswordModal.vue'
import ErrorModal from '@/components/common/Modal/auth/ErrorModal.vue'

interface Props {
  isOpen: boolean
}

const props = withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  'update:isOpen': [value: boolean]
}>()

const currentStep = ref('phone')
const phone = ref('')
const errorText = ref('')

const currentModal = computed(() => {
  switch (currentStep.value) {
    case 'phone':
      return RecoveryPhoneModal
    case 'password':
      return RecoveryPasswordModal
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
    case 'error':
      return {
        ...baseProps,
        errorText: errorText.value
      }
    default:
      return baseProps
  }
})

const handleSubmit = (...args: unknown[]) => {
  const value = args[0] as string;
  try {
    if (currentStep.value === 'phone') {
      // TODO: Добавить API запрос для отправки кода
      phone.value = value
      currentStep.value = 'password'
    } else if (currentStep.value === 'password') {
      // TODO: Добавить API запрос для смены пароля
      emit('update:isOpen', false)
      handleClose()
    }
  } catch (error) {
    errorText.value = 'Произошла ошибка. Попробуйте еще раз.'
    currentStep.value = 'error'
  }
}

const handleRetry = () => {
  currentStep.value = 'phone'
}

const handleClose = () => {
  emit('update:isOpen', false)
  // Сброс состояния при закрытии
  setTimeout(() => {
    currentStep.value = 'phone'
    phone.value = ''
    errorText.value = ''
  }, 300)
}

defineOptions({
  name: 'RecoveryModals'
})
</script> 