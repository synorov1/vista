<template>
  <BaseModal v-model:is-open="modelValue" @close="emit('update:isOpen', false)">
    <div class="recommendation-modal">
      <div class="recommendation-modal__icon">
        <img
          src="@/assets/images/magic.svg"
          alt="magic"
          class="recommendation-modal__icon-item"
        >
      </div>

      <div class="recommendation-modal__text">
        <h2 class="recommendation-modal__title">
          Подобрали<br>товары для вас
        </h2>
        <p class="recommendation-modal__description">
          Скоро начало сезона, обратите ваше внимание на эти товары. По ним у нас для вас отличное предложение
        </p>
      </div>

      <div class="recommendation-modal__cards">
        <div class="recommendation-modal__cards-row">
          <div class="recommendation-modal__card">
            <img
              src="@/assets/images/product-1.jpg"
              alt="product"
              class="recommendation-modal__card-image"
            >
            <div class="recommendation-modal__card-rating">
              <svg
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
              >
                <path d="M6.99999 1L8.97107 4.98278L13.3397 5.57886L10.17 8.65722L10.8778 13L6.99999 10.9828L3.12216 13L3.83002 8.65722L0.660254 5.57886L5.02891 4.98278L6.99999 1Z" fill="#FFA763" />
              </svg>
              <span>4.8</span>
            </div>
            <div class="recommendation-modal__card-price">
              <img src="@/assets/images/rec.svg"/>
              <span>3 180 ₽</span>
              <span class="recommendation-modal__card-price-old">5 600 ₽</span>
            </div>
            <button class="recommendation-modal__card-like">
              <img src="@/assets/images/like.svg"/>
            </button>
          </div>
          <div class="recommendation-modal__card">
            <img
              src="@/assets/images/product-2.jpg"
              alt="product"
              class="recommendation-modal__card-image"
            >
            <div class="recommendation-modal__card-rating">
              <svg
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
              >
                <path d="M6.99999 1L8.97107 4.98278L13.3397 5.57886L10.17 8.65722L10.8778 13L6.99999 10.9828L3.12216 13L3.83002 8.65722L0.660254 5.57886L5.02891 4.98278L6.99999 1Z" fill="#FFA763" />
              </svg>
              <span>5</span>
            </div>
            <div class="recommendation-modal__card-price">
              <img src="@/assets/images/rec.svg"/>
              <span>700 ₽</span>
              <span class="recommendation-modal__card-price-old">1 000 ₽</span>
            </div>
            <button class="recommendation-modal__card-like">
              <img src="@/assets/images/like.svg"/>
            </button>
          </div>
        </div>
        <div class="recommendation-modal__cards-row">
          <div class="recommendation-modal__card">
            <img
              src="@/assets/images/product-3.jpg"
              alt="product"
              class="recommendation-modal__card-image"
            >
            <div class="recommendation-modal__card-rating">
              <svg
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
              >
                <path d="M6.99999 1L8.97107 4.98278L13.3397 5.57886L10.17 8.65722L10.8778 13L6.99999 10.9828L3.12216 13L3.83002 8.65722L0.660254 5.57886L5.02891 4.98278L6.99999 1Z" fill="#FFA763" />
              </svg>
              <span>5</span>
            </div>
            <div class="recommendation-modal__card-price">
              <img src="@/assets/images/rec.svg"/>

              <span>10 650 ₽</span>
              <span class="recommendation-modal__card-price-old">15 600 ₽</span>
            </div>
            <button class="recommendation-modal__card-like">
              <img src="@/assets/images/like.svg"/>
            </button>
          </div>
          <div class="recommendation-modal__card">
            <img
              src="@/assets/images/product-4.jpg"
              alt="product"
              class="recommendation-modal__card-image"
            >
            <div class="recommendation-modal__card-rating">
              <svg
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
              >
                <path d="M6.99999 1L8.97107 4.98278L13.3397 5.57886L10.17 8.65722L10.8778 13L6.99999 10.9828L3.12216 13L3.83002 8.65722L0.660254 5.57886L5.02891 4.98278L6.99999 1Z" fill="#FFA763" />
              </svg>
              <span>5</span>
            </div>
            <div class="recommendation-modal__card-price">
              <img src="@/assets/images/rec.svg"/>
              <span>5 850 ₽</span>
              <span class="recommendation-modal__card-price-old">6 600 ₽</span>
            </div>
            <button class="recommendation-modal__card-like">
              <img src="@/assets/images/like.svg"/>
            </button>
          </div>
        </div>
      </div>

      <button class="recommendation-modal__button">
        Отправить все в избранное
      </button>
    </div>
  </BaseModal>
</template>

<script setup lang="ts">
import BaseModal from '@/components/common/Modal/BaseModal.vue'
import { computed } from 'vue'

defineOptions({
  name: 'RecommendationModal'
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
.recommendation-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
  width: 100%;
}

:deep(.modal__content) {
  max-width: 530px;
}

.recommendation-modal__icon {
  display: flex;
  gap: 10px;
}

.recommendation-modal__icon-item {
  width: 70px;
  height: 70px;
}

.recommendation-modal__text {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
}

.recommendation-modal__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000000;
  margin: 0;
  text-align: center;
}

.recommendation-modal__description {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0%;
  color: #4D4D4D;
  margin: 0;
  text-align: center;
}

.recommendation-modal__cards {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;
  margin-top: 14px;
}

.recommendation-modal__cards-row {
  display: flex;
  gap: 16px;
  width: 100%;
}

.recommendation-modal__card {
  position: relative;
  width: 100%;
  border: 1px solid #D9D9D9;
  border-radius: 20px;
  overflow: hidden;
  height: 240px;
  padding: 16px;
}

.recommendation-modal__card-image {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.recommendation-modal__card-rating {
  position: absolute;
  top: 10px;
  left: 10px;
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 4px 6px;
  background: var(--white-color);
  border-radius: 30px;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.recommendation-modal__card-price {
  position: absolute;
  bottom: 10px;
  left: 10px;
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 4px 6px;
  background: var(--red-color);
  border-radius: 30px;
  font-weight: 500;
  font-size: 14px;
  line-height: 17px;
  letter-spacing: -0.02em;
  color: var(--white-color);
}

.recommendation-modal__card-price-old {
  font-size: 12px;
  line-height: 15px;
  text-decoration: line-through;
}

.recommendation-modal__card-like {
  position: absolute;
  top: 10px;
  right: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  background: var(--white-color);
  border: none;
  border-radius: 50%;
  cursor: pointer;
  transition: opacity 0.2s;
}

.recommendation-modal__card-like:hover {
  opacity: 0.7;
}

.recommendation-modal__button {
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
  margin-top: 14px;
}

.recommendation-modal__button:hover {
  opacity: 0.7;
}
</style> 