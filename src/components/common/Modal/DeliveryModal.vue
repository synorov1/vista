<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="delivery-modal">
      <div class="delivery-modal__icon">
        <svg
          width="48"
          height="48"
          viewBox="0 0 48 48"
          fill="none"
        >
          <path
            d="M40 18L34 6H14L8 18M40 18L24 42M40 18H8M8 18L24 42M24 42L30 30H18L24 42Z"
            stroke="#0084FF"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </div>

      <div class="delivery-modal__text">
        <h2 class="delivery-modal__title">
          Доставка
        </h2>
        <p class="delivery-modal__description">
          Самовызов или доставка
        </p>
      </div>

      <p class="delivery-modal__info">
        Нижеуказанные скидки не распространяются на оборудование и тренажёры. Скидки на эти позиции Вы сможете уточнить у наших сотрудников.<br><br>
        Единовременная и накопительная скидки не суммируются, из предложенных используется максимальная. В нашем магазине представлены два вида систем скидок:
      </p>

      <button class="delivery-modal__button">
        Подробнее
      </button>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import { computed } from 'vue'

defineOptions({
  name: 'DeliveryModal'
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
.delivery-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
  width: 100%;
  padding: 30px;
}

.delivery-modal__icon {
  display: flex;
  align-items: center;
  justify-content: center;
}

.delivery-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.delivery-modal__title {
  font-weight: 700;
  font-size: 40px;
  line-height: 48px;
  letter-spacing: -0.02em;
  text-align: center;
  color: var(--black-color);
  margin: 0;
}

.delivery-modal__description {
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  text-align: center;
  color: var(--gray-800-color);
  margin: 0;
}

.delivery-modal__info {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  margin: 0;
}

.delivery-modal__button {
  width: 100%;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--blue-color);
  border: none;
  border-radius: 6px;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
  cursor: pointer;
  transition: opacity 0.2s;
}

.delivery-modal__button:hover {
  opacity: 0.7;
}
</style> 