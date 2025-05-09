<script lang="ts" setup>
import Sale from '@/components/common/Sale.vue';
import IconImageEmpty from '@/components/icons/IconImageEmpty.vue';
import GreyButton from "@/components/common/Buttons/GreyButton.vue";

const props = defineProps({
  image: {
    type: String,
    default: '',  
  },
  title: {
    type: String,
    required: true,
  },
  isImportant: {
    type: Boolean,
    default: false,
  },
  text: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <div class="post-articles-card">
    <div class="post-articles-card__image-wrapper">
      <Sale
        v-if="props.isImportant"
        class="post-articles-card__important"
        text="Важно"
      />
  
      <img
        v-if="props.image"
        :src="props.image"
        alt="Post articles image"
        class="post-articles-card__image"
      >
    
      <div v-else class="post-articles-card__image-empty">
        <IconImageEmpty />
      </div>
    </div>

    <div class="post-articles-card__content">
      <h4 class="post-articles-card__title">
        {{ props.title }}
      </h4>
    
      <p class="post-articles-card__text">
        {{ props.text }}
      </p>

      <GreyButton class="post-articles-card__button" text="Читать" />
    </div>
  </div>
</template>

<style scoped>
.post-articles-card {
  padding: 16px;
  background-color: var(--gray-100-color);
  gap: 16px;
  display: flex;
  flex-direction: column;
  border-radius: 16px;
  color: var(--black-color);
  text-decoration: none;
  height: 100%;
}

.post-articles-card__image-wrapper {
  position: relative;
  background-color: var(--white-color);
  border-radius: 16px;
  overflow: hidden;
  width: 100%;
  height: 129px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.post-articles-card__important {
  position: absolute;
  left: 16px;
  top: 16px;
  z-index: 2;
}

.post-articles-card__image {
  display: block;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 4px;
  width: 183px;
  object-fit: contain;
}

.post-articles-card__image-empty {
  font-size: 50px;
  line-height: 0;
  color: var(--gray-400-color);
}

.post-articles-card__content {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.post-articles-card__title {
  font-size: 14px;
  font-weight: 700;
  line-height: 17px;
  color: var(--black-color);
  margin-bottom: 9px
}

.post-articles-card__text {
  font-size: 14px;
  font-weight: 400;
  line-height: 17px;
  margin-bottom: 16px;
  color: var(--gray-600-color);
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.post-articles-card__button {
  margin-top: auto;
  width: 100%;
}

@media (min-width: 768px) {
  .post-articles-card {
    flex-direction: row;
    padding: 20px;
    gap: 20px;
  }

  .post-articles-card__image-wrapper {
    width: 150px;
    height: 210px;
    flex-shrink: 0;
  }

  .post-articles-card__image {
    transform: none;
    top: 45px;
    right: 10px;
  }

  .post-articles-card__text {
    display: block;
  }

  .post-articles-card__button{
    width: 170px;
  }
}

@media (min-width: 1440px) {
  .post-articles-card__title {
    font-size: 16px;
    line-height: 19px;
  }
}
</style>