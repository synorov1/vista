<template>
  <div class="range-control">
    <div class="range-control__inputs">
      <div class="range-control__input-wrapper">
        <input 
          v-model="minValue" 
          type="text"
          class="range-control__input"
          placeholder="от 50 ₽"
          @input="handleMinInput"
        >
      </div>
      <div class="range-control__input-wrapper">
        <input 
          v-model="maxValue" 
          type="text"
          class="range-control__input"
          placeholder="до 1 млн.₽"
          @input="handleMaxInput"
        >
      </div>
    </div>
    <div ref="slider" class="range-control__slider">
      <div 
        class="range-control__track"
        :style="{ background: `linear-gradient(to right, 
          #F0F0F0 0%, 
          #F0F0F0 ${((minValue - min) / (max - min)) * 100}%,
          #0084FF ${((minValue - min) / (max - min)) * 100}%, 
          #0084FF ${((maxValue - min) / (max - min)) * 100}%, 
          #F0F0F0 ${((maxValue - min) / (max - min)) * 100}%, 
          #F0F0F0 100%)` 
        }"
      />
      <div 
        class="range-control__thumb"
        :style="{ left: `${((minValue - min) / (max - min)) * 100}%` }"
        @mousedown="startDrag($event, 'min')"
      />
      <div 
        class="range-control__thumb"
        :style="{ left: `${((maxValue - min) / (max - min)) * 100}%` }"
        @mousedown="startDrag($event, 'max')"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onUnmounted } from 'vue'
import type { PropType } from 'vue'

const props = defineProps({
  modelValue: {
    type: Array as unknown as PropType<[number, number]>,
    required: true
  },
  min: {
    type: Number,
    default: 50
  },
  max: {
    type: Number,
    default: 1000000
  }
})

const emit = defineEmits(['update:modelValue'])

const minValue = ref(props.modelValue[0])
const maxValue = ref(props.modelValue[1])
const slider = ref<HTMLElement | null>(null)
const isDragging = ref(false)
const currentThumb = ref<'min' | 'max'>('min')

const handleMinInput = () => {
  const value = Math.min(Number(minValue.value), maxValue.value)
  minValue.value = Math.max(props.min, value)
  emit('update:modelValue', [minValue.value, maxValue.value])
}

const handleMaxInput = () => {
  const value = Math.max(Number(maxValue.value), minValue.value)
  maxValue.value = Math.min(props.max, value)
  emit('update:modelValue', [minValue.value, maxValue.value])
}

const startDrag = (event: MouseEvent, thumb: 'min' | 'max') => {
  event.preventDefault()
  isDragging.value = true
  currentThumb.value = thumb
  document.addEventListener('mousemove', onDrag)
  document.addEventListener('mouseup', stopDrag)
}

const onDrag = (event: MouseEvent) => {
  if (!isDragging.value || !slider.value) return

  const rect = slider.value.getBoundingClientRect()
  const percent = Math.min(Math.max((event.clientX - rect.left) / rect.width, 0), 1)
  const value = Math.round(percent * (props.max - props.min) + props.min)

  if (currentThumb.value === 'min') {
    minValue.value = Math.min(value, maxValue.value)
  } else {
    maxValue.value = Math.max(value, minValue.value)
  }

  emit('update:modelValue', [minValue.value, maxValue.value])
}

const stopDrag = () => {
  isDragging.value = false
  document.removeEventListener('mousemove', onDrag)
  document.removeEventListener('mouseup', stopDrag)
}

onUnmounted(() => {
  document.removeEventListener('mousemove', onDrag)
  document.removeEventListener('mouseup', stopDrag)
})
</script>

<style scoped>
.range-control {
  width: 100%;
  max-width: 240px;
}

.range-control__title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 20px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin-bottom: 10px;
}

.range-control__inputs {
  display: flex;
  gap: 10px;
  margin-bottom: 10px;
}

.range-control__input-wrapper {
  flex: 1;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  padding: 14px;
}

.range-control__input {
  width: 100%;
  border: none;
  outline: none;
  font-family: 'Inter', sans-serif;
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #A0A0A0;
}

.range-control__slider {
  position: relative;
  height: 2px;
  margin: 15px 0;
}

.range-control__track {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 100px;
}

.range-control__thumb {
  position: absolute;
  width: 16px;
  height: 16px;
  background: #0084FF;
  border-radius: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  cursor: pointer;
}
</style> 