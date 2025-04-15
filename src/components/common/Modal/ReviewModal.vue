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
            <img src="@/assets/icons/star-rating.svg" alt="Star icon">
            3.8<span> - 3 214 оценки</span>
          </div>
        </div>
      </div>

      <div class="review-modal__rating">
        <img 
          v-for="i in 5" 
          :key="i" 
          src="@/assets/icons/star2.svg" 
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
              <img src="@/assets/icons/upload-image.svg" alt="Upload image">
            </div>
          </div>
          <button class="review-modal__upload-button">
            Загрузить фото
          </button>
        </div>

        <button class="review-modal__submit" @click="handleSubmit">
          Отправить
        </button>

        <div class="policy">
          <ModalPolicy />
        </div>
      </div>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import ModalPolicy from '@/components/ModalPolicy.vue';

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
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.review-modal__description {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.review-modal__product {
  display: flex;
  align-self: stretch;
  gap: 16px;
}

.review-modal__product-image {
  width: 100px;
  height: 120px;
  border: 1px solid #D9D9D9;
  border-radius: 10px;
  overflow: hidden;
  padding: 30px 20px;
}

.review-modal__product-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.review-modal__product-info {
  display: flex;
  flex-direction: column;
  gap: 6px;
  flex: 1;
}

.review-modal__product-category {
  font-size: 14px;
  line-height: 24px;
  letter-spacing: 0;
  color: #4D4D4D;
}

.review-modal__product-name {
  font-weight: 700;
  font-size: 16px;
  line-height: 100%;
  letter-spacing: -2%;
  color: var(--black-color);
}

.review-modal__product-rating {
  display: flex;
  align-items: center;
  gap: 4px;
  color: #000;
  font-size: 14px;
  font-weight: 700;
  line-height: 100%;
  letter-spacing: 0%;
}

.review-modal__product-rating span {
  color: #A0A0A0;
  font-weight: 400;
}

.review-modal__rating {
  display: flex;
  gap: 6px;
}

.review-modal__rating img {
  width: 36px;
  height: 36px;
  cursor: pointer;
}

.review-modal__rating-star--active {
  filter: invert(65%) sepia(100%) saturate(1000%) hue-rotate(190deg) brightness(100%) contrast(100%);
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
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: #000000;
  text-align: left;
  letter-spacing: 0%;
}

.review-modal__form-group input {
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

.review-modal__form-group textarea {
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
  min-height: 180px;
  resize: vertical;
}

.review-modal__form-group textarea {
  height: 180px;
  resize: none;
}

textarea:focus,
input:focus {
  outline: none;
  border-color: #0084FF;
}

.review-modal__upload {
  display: flex;
  gap: 16px;
}

.review-modal__upload-item {
  width: 120px;
  height: 150px;
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
  line-height: 100%;
  font-weight: 400;
  letter-spacing: 0;
  color: var(--blue-color);
  cursor: pointer;
}

.review-modal__submit {
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