<template>
  <a class="profile-item-card" :href="product.href">
    <div class="profile-item-card__image-wrap">
      <div class="profile-item-card__labels">
        <Label
          :color="product.label.color"
          :text="product.label.text"
        />
        <Like class="profile-item-card__like" :liked="product.like" />
      </div>
      <img
        src="@/assets/images/backpack.png"
        alt="backpack"
        class="profile-item-card__image"
      >   
    </div>
    <div class="profile-item-card__info">
      <div class="profile-item-card__prices">
        <span class="profile-item-card__current-price">{{ prices.main }} ₽</span>
        <span v-if="prices.old" class="profile-item-card__old-price">{{ prices.old }} ₽</span>
      </div>

      <div class="profile-item-card__delivery">
        <span>{{ product.delivery.status }} {{ product.delivery.date }}</span>
      </div>

      <BlackButton class="w-100" text="Оставить отзыв" />
    </div>
  </a>
</template>

<script setup lang="ts">
import Label from '~/components/common/Label.vue';
import Like from '~/components/common/Like.vue';
import { computed, toRef } from 'vue';
import BlackButton from '@/components/common/Buttons/BlackButton.vue';

const props = defineProps({
  content: {
    type: Object,
    required: true,
  }
})

const product = toRef(props, 'content');

const prices = computed(() => {
  return {
    main: new Intl.NumberFormat('ru-RU').format(product.value.price),
    ...(product.value.oldPrice ? { old: new Intl.NumberFormat('ru-RU').format(product.value.oldPrice) } : {}),
  }
})
</script>

<style scoped>
.profile-item-card {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 10px;
  position: relative;
  border: none;
  width: 100%;
  text-decoration: none;
}

.profile-item-card__labels {
  position: absolute;
  display: flex;
  left: 16px;
  right: 16px;
  top: 16px;
  flex-direction: row;
  justify-content: space-between;
}

.profile-item-card__image-wrap {
  display: flex;
  position: relative;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  min-width: 139px;
  min-height: 200px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
  border-radius: 12px;
  width: 100%;
}

.profile-item-card__image {
  max-width: 100%;
  height: 111px;
  object-fit: contain;
  display: block;
}

.profile-item-card__like {
  width: 20px;
  height: 20px;
  margin-left: auto;
}

.profile-item-card__info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 10px;
  width: 100%;
}

.profile-item-card__prices {
  display: flex;
  align-items: center;
  gap: 10px;
}

.profile-item-card__current-price {
  font-weight: 800;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.02em;
  color: var(--blue-400-color);
}

.profile-item-card__old-price {
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  text-decoration-line: line-through;
  color: var(--gray-600-color);
}

.profile-item-card__delivery {
  font-weight: 600;
  font-size: 12px;
  line-height: 14px;
  color: var(--gray-600-color);
}

@media (min-width: 768px) {
  .profile-item-card {
    gap: 16px;
  }

  .profile-item-card__image-wrap {
    min-height: 240px;
  }

  .profile-item-card__delivery {
    font-size: 14px;
    line-height: 17px;
  }

  .profile-item-card__image {
    height: 169px;
  }

  .profile-item-card__current-price {
    font-size: 18px;
    line-height: 21px;
  }
}
</style>
