<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="search-modal">
      <div class="search-modal__icon">
        <img src="@/assets/icons/search.svg" alt="Atom icon">
      </div>
      <div class="search-modal__content">
        <h2 class="search-modal__title">
          Найдем любой товар
        </h2>
        <p class="search-modal__description">
          А если не получится. То наши профессиональные консультант легко с этим справятся
        </p>
      </div>
      <button class="search-modal__button" @click="$emit('update:isOpen', false)">
        Все понял
      </button>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import { computed } from 'vue'

defineOptions({
  name: 'SearchModal'
})
interface Props {
  isOpen?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  (e: 'update:isOpen', value: boolean): void
}>()

const modelValue = computed({
  get: () => props.isOpen,
  set: (value) => emit('update:isOpen', value)
})
</script>

<style scoped>
.search-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
  background: var(--white-color);
  border-radius: 20px;
}

:deep(.modal__content) {
  max-width: 530px;
}
.search-modal__icon {
  width: 80px;
  height: 80px;
}

.search-modal__content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.search-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.search-modal__description {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.search-modal__button {
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
</style> 