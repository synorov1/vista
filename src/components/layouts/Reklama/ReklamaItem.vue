<template>
  <div class="reklama-item" :style="reklamaStyle" :class="{ reverse: reverse, 'text-white': textColor === 'white' }">
    <div class="text">
      <h1 class="title">{{ title }}</h1>
      <p class="description">{{ description }}</p>
      <slot name="label"></slot>
    </div>
    <div class="image-container">
      <img :src="imageSrc" alt="Product Image" class="image" />
    </div>
  </div>
</template>

<script setup lang="ts">
  import { toRef, computed } from 'vue';

  const props = defineProps({
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    imageSrc: {
      type: String,
      required: true
    },
    backgroundColor: {
      type: String,
      default: 'var(--gray-200-color)'
    },
    reverse: {
      type: Boolean,
      default: false
    },
    textColor: {
      type: String,
      default: 'dark'
    }
  });
  const backgroundColor = toRef(props, 'backgroundColor');
  const reklamaStyle = computed(() => {
    return {
      backgroundColor: backgroundColor.value
    };
  })
</script>

<style scoped>
.reklama-item {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 16px;
  width: 100%;
  border-radius: 16px;
  position: relative;
}

.reklama-item.reverse {
  flex-direction: column-reverse;
}

.text {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 16px;
  gap: 10px;
  width: 100%;
}

.title {
  width: 100%;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.description {
  width: 100%;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
}

.image-container {
  width: 100%;
  height: auto;
  position: relative;
}

.image {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.reklama-item.text-white .title,
.reklama-item.text-white .description {
  color: var(--white-color);
}

@media (min-width: 768px) {
  .reklama-item {
    flex-direction: row;
    height: 250px;
    border-radius: 20px;
  }

  .reklama-item.reverse {
    flex-direction: row-reverse;
  }

  .text {
    padding: 30px;
    width: 50%;
    height: 100%;
  }

  .title {
    font-size: 26px;
    line-height: 31px;
  }

  .description {
    width: 100%;
    height: auto;
  }

  .image-container {
    width: 50%;
    height: 100%;
  }

  .image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}

@media (min-width: 1024px) {
  .reklama-item {
    width: 467px;
    height: 250px;
    flex-direction: row;
    flex-grow: 1;
  }

  .reklama-item.reverse {
    flex-direction: row-reverse;
  }

  .text {
    position: absolute;
    width: 257px;
    height: 120px;
    left: 30px;
    top: 30px;
    padding: 0px;
    gap: 10px;
  }

  .title {
    width: 262px;
    height: 62px;
    font-size: 26px;
    line-height: 31px;
  }

  .description {
    width: 257px;
    height: 48px;
  }

  .image-container {
    position: absolute;
    width: 180px;
    height: 249px;
    left: 287px;
    top: 1px;
  }

  .image {
    position: absolute;
    width: 94px;
    height: 94px;
    left: calc(50% - 94px/2);
    top: calc(50% - 94px/2 + 0.5px);
  }

  .vector {
    position: absolute;
    left: 12.5%;
    right: 12.5%;
    top: 12.5%;
    bottom: 12.5%;
    background-color: var(--gray-500-color);
  }
}
</style>
