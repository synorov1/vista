<script lang="ts" setup>
import LeftArrowButton from '~/components/common/buttons/LeftArrowButton.vue';
import RightArrowButton from '~/components/common/buttons/RightArrowButton.vue';
import RoundButton from "@/components/common/Buttons/RoundButton.vue";
import { computed, type PropType } from 'vue';
import XSBlueButton from '@/components/common/Buttons/XSBlueButton.vue';

const props = defineProps({
  title: {
    type: String,
    required: false,
    default: '',
  },
  buttonText: {
    type: String,
    default: '',
  },
  buttonType: {
    type: String as PropType<'round' | 'blue'>,
    default: 'round',
  },
  hasArrows: {
    type: Boolean,
    default: true,
  },
})

const emits = defineEmits(['click-arrow-left', 'click-arrow-right', 'button-click'])

const currentButton = computed(() => {
  switch (props.buttonType) {
    case 'round':
      return RoundButton;
    case 'blue':
      return XSBlueButton;
    default:
      return null;
  }
})
</script>

<template>
  <div class="title-with-arrow">
    <button
      v-if="buttonText"
      class="title-with-arrow__button-link"
      type="button"
      @click="emits('button-click')"
    >
      {{ buttonText }}
    </button>

    <p v-if="title" class="title-with-arrow__title">
      {{ title }}
    </p>

    <component
      :is="currentButton"
      v-if="props.buttonText"
      class="title-with-arrow__button"
      height="45px"
      :text="props.buttonText"
      @click="emits('button-click')"
    />

    <div 
      v-if="hasArrows"
      class="title-with-arrow__navigation"
    >
      <LeftArrowButton @click="emits('click-arrow-left')" />
      <RightArrowButton @click="emits('click-arrow-right')" />
    </div>
  </div>
</template>

<style scoped>
.title-with-arrow {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.title-with-arrow__button-link {
  font-size: 14px;
  font-weight: 600;
  line-height: 17px;
  text-align: left;
  text-decoration: underline;
  color: var(--blue-400-color);
  padding: 0;
  border: none;
  background-color: transparent;
  cursor: pointer;
}

.title-with-arrow__button {
  display: none;
}

.title-with-arrow__title {
  font-size: 24px;
  font-weight: 800;
  line-height: 29px;
  letter-spacing: -0.02em;
  margin-bottom: 0;
}

.title-with-arrow__navigation {
  display: none;
}

@media (min-width: 768px) {
  .title-with-arrow {
    flex-direction: row;
    gap: 16px;
    align-items: center;
  }

  .title-with-arrow__title {
    font-size: 30px;
    line-height: 36px;
  }

  .title-with-arrow__button-link {
    display: none;
  }

  .title-with-arrow__button,
  .title-with-arrow__navigation {
    display: flex;
  }

  .title-with-arrow__navigation {
    margin-left: auto;
    gap: 10px;
  }
}
</style>