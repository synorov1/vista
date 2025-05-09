<script lang="ts" setup>
import { ref } from 'vue';
import IconArrowBottom from '@/components/icons/IconArrowBottom.vue';

const isActive = ref(false);

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <div class="accordion" :class="{ 'accordion_active': isActive }">
    <div class="accordion__header" @click="isActive = !isActive">
      <p class="accordion__title">
        {{ props.title }}
      </p>
      <div class="accordion__icon">
        <IconArrowBottom />
      </div>
    </div>

    <div class="accordion__content">
      <div>
        <slot name="content" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.accordion {
  background-color: var(--gray-200-color);
  border-radius: 20px;
}
.accordion__header {
  padding: 16px 23px 16px 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.accordion__title {
  font-weight: 700;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.02em;
  padding-right: 25px;
  flex-grow: 1;
  cursor: pointer;
  margin-bottom: 0;
}

.accordion__icon {
  transition: transform 0.2s ease-in-out;
  font-size: 19px;
  color: var(--gray-800-color);
}

.accordion__content {
  display: grid;
  grid-template-rows: 0fr;
  padding: 0 16px;
  transition: all 0.2s ease-in-out;
}

.accordion__content > div {
  overflow: hidden;
}

.accordion_active .accordion__content {
  grid-template-rows: 1fr;
  padding-bottom: 16px;
}

.accordion_active .accordion__icon {
  transform: rotate(180deg);
}

@media (min-width: 768px) {
  .accordion__header {
    padding: 20px 27px 20px 20px
  }

  .accordion__content {
    padding: 0 20px;
  }

  .accordion_active .accordion__content {
    padding-bottom: 20px;
}
}
</style>
