<script lang="ts" setup>
import { computed } from 'vue';
import IconArrowRight from '@/components/icons/IconArrowRight.vue';
import { RouterLink } from 'vue-router';

const props = defineProps({
  to: {
    type: String,
    default: '',
  },
  href: {
    type: String,
    default: '',
  },
  icon: {
    type: String,
    default: '',
  },
  title: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
});

const currentComponent = computed(() => {
  if (props.to) {
    return RouterLink;
  }

  if (props.href) {
    return 'a';
  }

  return 'div';
})
</script>

<template>
  <component
    :is="currentComponent"
    :to="props.to"
    :href="props.href"
    class="arrow-card"
  >
    <div v-if="props.icon" class="arrow-card__icon-wrapper">
      <img
        :src="props.icon"
        alt=""
        class="arrow-card__icon"
      >
    </div>

    <div class="arrow-card__content">
      <span class="arrow-card__title">{{ props.title }}</span>

      <span class="arrow-card__text">{{ props.text }}</span>
    </div>

    <div class="arrow-card__arrow">
      <IconArrowRight />
    </div>
  </component>
</template>

<style scoped>
.arrow-card {
  padding: 20px;
  background-color: var(--gray-200-color);
  color: var(--gray-800-color);
  border-radius: 16px;
  display: flex;
  flex-wrap: wrap;
  height: 100%;
  position: relative;
}

.arrow-card__wrapper:hover {
  color: inherit;
}

.arrow-card__content {
  display: flex;
  flex-direction: column;
  width: 100%;
  padding-right: 20px;
}

.arrow-card__icon-wrapper {
  color: var(--blue-400-color);
  width: 24px;
  height: 24px;
  margin-bottom: 16px;
}

.arrow-card__icon {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: contain; 
}

.arrow-card__title {
  color: var(--black-color);
  font-weight: 700;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  margin-bottom: 4px;
}

.arrow-card__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
}

.arrow-card__arrow {
  display: flex;
  font-size: 11px;
  position: absolute;
  right: 26px;
  top: 37px;
}

@media (min-width: 768px) { 
  .arrow-card  {
    flex-wrap: nowrap;
  }

  .arrow-card__icon-wrapper {
    margin-right: 16px;
    margin-bottom: 0;
  }

  .arrow-card__title {
    font-size: 16px;
    line-height: 19px;
  }

  .arrow-card__content {
    width: auto;
    flex-grow: 1;
    padding-right: 0;
  }

  .arrow-card__arrow {
    position: static;
    padding-top: 17px;
    padding-right: 6px;
    padding-left: 15px;
  }
}

@media (min-width: 1024px) { 
  .arrow-card__icon-wrapper {
    width: 30px;
    height: 30px;
  }
}

@media (min-width: 1440px) {
  .arrow-card__icon-wrapper {
    width: 37px;
    height: 37px;
  }

  .arrow-card__title {
    font-size: 20px;
    line-height: 24px;
  }
}
</style>