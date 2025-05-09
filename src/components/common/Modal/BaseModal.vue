<template>
  <Transition name="fade">
    <div 
      v-if="isOpen"
      class="modal" 
      @click="closeModal"
    >
      <div 
        class="modal__content" 
        @click.stop
      >
        <button 
          class="modal__close" 
          @click="closeModal"
        >
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M22 2.00008L2.00008 22M2 2L22 22"
              stroke="white"
              stroke-width="3"
              stroke-linecap="round"
            />
          </svg>
        </button>

        <slot />
      </div>
    </div>
  </Transition>
</template>

<script setup lang="ts">
defineOptions({
  name: 'BaseModal'
})

interface Props {
  isOpen?: boolean
}

withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  (e: 'close'): void
}>()

const closeModal = () => {
  emit('close')
}
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
}

.modal__content {
  position: relative;
  background: #FFFFFF;
  border-radius: 20px;
  padding: 30px;
  display: flex;
  flex-direction: column;
  gap: 30px;
  max-width: 450px;
  width: 100%;
}

.modal__close {
  position: absolute;
  top: -39px;
  right: -36px;
  width: 24px;
  height: 24px;
  padding: 0;
  border: none;
  background: none;
  color: #000;
  cursor: pointer;
  transition: opacity 0.2s;
}

.modal__close:hover {
  opacity: 0.7;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style> 