<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="search-modal">
      <div class="search-modal__icon">
        <img src="@/assets/icons/atom.svg" alt="Atom icon">
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
  padding: 30px;
  background: var(--white-color);
  border-radius: 20px;
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
  font-weight: 700;
  font-size: 40px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  text-align: center;
  color: var(--black-color);
}

.search-modal__description {
  font-weight: 500;
  font-size: 16px;
  line-height: 1.5;
  text-align: center;
  color: #4D4D4D;
}

.search-modal__button {
  width: 100%;
  padding: 14px;
  background: var(--blue-color);
  border-radius: 6px;
  border: none;
  font-weight: 700;
  font-size: 14px;
  line-height: 1.21;
  color: var(--white-color);
  cursor: pointer;
}
</style> 