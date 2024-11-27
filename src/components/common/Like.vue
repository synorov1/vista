<template>
  <div class="like-container" @click="toggleLike" @mouseover="hoverLike" @mouseleave="leaveLike">
    <img :src="heartSrc" alt="Heart Icon" class="heart" />
  </div>
</template>

<script setup lang="ts">
import { ref, watch, toRef } from 'vue';

const props = defineProps({
  liked: {
    type: Boolean,
    default: false,
  },
});

const isLiked = toRef(props, 'liked');
const heartSrc = ref(isLiked.value ? '/src/assets/icons/heart-filled.svg' : '/src/assets/icons/heart.svg');

const toggleLike = () => {
  isLiked.value = !isLiked.value;
  heartSrc.value = isLiked.value ? '/src/assets/icons/heart-filled.svg' : '/src/assets/icons/heart.svg';
};

const hoverLike = () => {
  if (!isLiked.value) {
    heartSrc.value = '/src/assets/icons/heart-filled.svg';
  } else {
    heartSrc.value = '/src/assets/icons/heart.svg';
  }
};

const leaveLike = () => {
  heartSrc.value = isLiked.value ? '/src/assets/icons/heart-filled.svg' : '/src/assets/icons/heart.svg';
};

watch(() => props.liked, (newVal) => {
  isLiked.value = newVal;
  heartSrc.value = isLiked.value ? '/src/assets/icons/heart-filled.svg' : '/src/assets/icons/heart.svg';
});
</script>

<style scoped>
.like-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 20px;
  height: 20px;
  cursor: pointer;
}

.heart {
  width: 100%;
  height: 100%;
  transition: all 0.3s ease;
}
</style>
