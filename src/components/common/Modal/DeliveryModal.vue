<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="delivery-modal">
      <div class="delivery-modal__icon">
        <img src="@/assets/images/delivery.svg">
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
}
:deep(.modal__content) {
  max-width: 530px;
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
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.delivery-modal__description {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.delivery-modal__info {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: left;
}

.delivery-modal__button {
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

.delivery-modal__button:hover {
  opacity: 0.7;
}
</style> 