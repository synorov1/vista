<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="review-modal">
      <div class="review-modal__header">
        <h2 class="review-modal__title">
          Отзыв на товар
        </h2>
        <p class="review-modal__description">
          Спасибо вам за то, что вы делаете наш интернет-магазин лучше
        </p>
      </div>

      <div class="review-modal__product">
        <div class="review-modal__product-image">
          <img src="@/assets/images/joola-1.jpg" alt="Product image">
        </div>
        <div class="review-modal__product-info">
          <span class="review-modal__product-category">Накладки</span>
          <h3 class="review-modal__product-name">
            Накладка DONIC BlueStar A1
          </h3>
          <div class="review-modal__product-rating">
            <img src="@/assets/icons/star.svg" alt="Star icon">
            <span>3.8 - 3 214 оценки</span>
          </div>
        </div>
      </div>

      <div class="review-modal__rating">
        <img 
          v-for="i in 5" 
          :key="i" 
          src="@/assets/icons/star.svg" 
          :class="{ 'review-modal__rating-star--active': i <= rating }" 
          alt="Star icon" 
          @click="rating = i"
        >
      </div>

      <div class="review-modal__form">
        <div class="review-modal__form-group">
          <label>Введите ваше имя</label>
          <input 
            v-model="name" 
            type="text" 
            placeholder="ФИО"
          >
        </div>

        <div class="review-modal__form-group">
          <label>Email</label>
          <input 
            v-model="email" 
            type="email" 
            placeholder="name@name.ru"
          >
        </div>

        <div class="review-modal__form-group">
          <label>Ваш отзыв</label>
          <textarea v-model="review" placeholder="Потрясный товар, буду однозначно заказывать" />
        </div>

        <div class="review-modal__form-group">
          <label>Прикрепите фото</label>
          <div class="review-modal__upload">
            <div 
              v-for="i in 3" 
              :key="i" 
              class="review-modal__upload-item"
            >
              <img src="@/assets/icons/image.svg" alt="Upload image">
            </div>
          </div>
          <button class="review-modal__upload-button">
            Загрузить фото
          </button>
        </div>

        <button class="review-modal__submit" @click="handleSubmit">
          Отправить
        </button>

        <p class="review-modal__policy">
          Оставляя ваши данные, вы соглашается с политикой конфиденциальности ИП Макарова Елена Валерьевна
        </p>
      </div>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue'

defineOptions({
  name: 'ReviewModal',
  inheritAttrs: false
})

interface Props {
  isOpen?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  isOpen: false
})

const emit = defineEmits<{
  (e: 'update:isOpen', value: boolean): void
  (e: 'submit', value: { name: string; email: string; review: string; rating: number }): void
}>()

const modelValue = computed({
  get: () => props.isOpen,
  set: (value) => emit('update:isOpen', value)
})

const name = ref('')
const email = ref('')
const review = ref('')
const rating = ref(0)

const handleSubmit = () => {
  emit('submit', {
    name: name.value,
    email: email.value,
    review: review.value,
    rating: rating.value
  })
  emit('update:isOpen', false)
}
</script>

<style scoped>
.review-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
  padding: 30px;
  background: var(--white-color);
  border-radius: 20px;
  width: 100%;
  max-width: 600px;
}

.review-modal__header {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.review-modal__title {
  font-weight: 700;
  font-size: 40px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  text-align: center;
  color: var(--black-color);
}

.review-modal__description {
  font-weight: 500;
  font-size: 16px;
  line-height: 1.5;
  text-align: center;
  color: #4D4D4D;
}

.review-modal__product {
  display: flex;
  align-self: stretch;
  gap: 16px;
}

.review-modal__product-image {
  width: 80px;
  height: 80px;
  border: 1px solid #D9D9D9;
  border-radius: 10px;
  overflow: hidden;
}

.review-modal__product-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.review-modal__product-info {
  display: flex;
  flex-direction: column;
  gap: 6px;
  flex: 1;
}

.review-modal__product-category {
  font-size: 14px;
  line-height: 1.71;
  color: #4D4D4D;
}

.review-modal__product-name {
  font-weight: 700;
  font-size: 16px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.review-modal__product-rating {
  display: flex;
  align-items: center;
  gap: 4px;
}

.review-modal__rating {
  display: flex;
  gap: 6px;
}

.review-modal__rating img {
  width: 24px;
  height: 24px;
  cursor: pointer;
}

.review-modal__rating-star--active {
  filter: invert(48%) sepia(79%) saturate(2476%) hue-rotate(190deg) brightness(118%) contrast(119%);
}

.review-modal__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;
}

.review-modal__form-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.review-modal__form-group label {
  font-size: 14px;
  line-height: 1.21;
  color: var(--black-color);
}

.review-modal__form-group input,
.review-modal__form-group textarea {
  width: 100%;
  padding: 14px 16px;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  font-size: 14px;
  line-height: 1.21;
  color: var(--black-color);
}

.review-modal__form-group textarea {
  height: 180px;
  resize: none;
}

.review-modal__upload {
  display: flex;
  gap: 16px;
}

.review-modal__upload-item {
  width: 80px;
  height: 80px;
  border: 1px solid #D9D9D9;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.review-modal__upload-button {
  align-self: flex-start;
  background: none;
  border: none;
  font-size: 14px;
  line-height: 1.21;
  color: var(--blue-color);
  cursor: pointer;
}

.review-modal__submit {
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

.review-modal__policy {
  font-size: 12px;
  line-height: 1.21;
  color: var(--black-color);
}
</style> 