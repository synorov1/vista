<template>
  <div class="order-progress">
    <div 
      v-for="(step, index) in steps" 
      :key="index"
      :class="[
        'progress-step', 
        { 
          'active': isStepActive(index),
          'completed': isStepCompleted(index),
          'current': isCurrentStep(index)
        }
      ]"
    >
      <div class="step-icon">
        <IconCartProgress 
          :completed="isStepCompleted(index)" 
          :active="isCurrentStep(index)"
        />
      </div>
      <span>{{ step.name }}</span>

    </div>
    <div class="timeline">
      <div class="line first-line" :class="{ 'completed': isStepCompleted(0) }" />
      <div class="line second-line" :class="{ 'completed': isStepCompleted(1) }" />
    </div>
  </div>
</template>

<script setup lang="ts">
import IconCartProgress from './icons/IconCartProgress.vue';

interface Step {
  name: string;
}

interface Props {
  currentStep?: number;
}

const props = withDefaults(defineProps<Props>(), {
  currentStep: 0
});

const steps: Step[] = [
  { name: "Корзина" },
  { name: "Авторизация" },
  { name: "Оплата" }
];

const isStepActive = (index: number) => {
  return index <= props.currentStep;
};

const isStepCompleted = (index: number) => {
  return index < props.currentStep;
};

const isCurrentStep = (index: number) => {
  return index === props.currentStep;
};
</script>

<style scoped>

.order-progress {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 23px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 20px;
  margin: 0 auto;
  position: relative;
  height: 105px;
  width: 100%;
}

.progress-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  position: relative;
  z-index: 2;
  flex: 1; /* Устанавливаем равные размеры для всех шагов */
}

.progress-step:nth-child(3) {
  align-items: flex-end;
}
.timeline {
  position: absolute;
  width: 100%;
  top: 40px;
}

.line {
  background: #F0F0F0;
  height: 1px;
  width: 100%;
  content: '';
  position: relative;
}

.line:first-child {
  left: 40px;
  width: calc(50% - 80px);
  background: #F0F0F0;
}
.line:last-child {
  margin-left: auto;
  right: 70px;
  width: calc(50% - 65px);
}
.first-line.completed {
  background: #0084FF;
}
.second-line.completed {
  background: linear-gradient(to right, #0084FF 70%, #F0F0F0 70%);
}
.progress-step:first-child {
  align-items: flex-start;
}

.progress-step:first-child .step-icon {
  left: 8px;
}

.progress-step:last-child .step-icon {
  right: 8px;
}

.progress-step span {
  font-size: 12px;
  line-height: 1.17;
  color: #4D4D4D;
  text-align: center;
}

.step-icon {
  width: 30px;
  height: 30px;
  background: #FFF;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  position: relative;
}

@media (max-width: 1024px) {
  .order-progress {
    max-width: 100%;
  }
  
  .order-progress::before {
    left: 45px;
    right: 45px;
  }
  
}




@media (max-width: 720px) {
  .order-progress {
    max-width: 100%;
    padding: 0 16px;
  }
  
  .progress-step:first-child {
    padding-left: 8px;
  }
  
  .progress-step:last-child {
    padding-right: 8px;
  }
  
  .order-progress::before {
    left: 35px;
    right: 35px;
  }
  
  .progress-step span {
    font-size: 10px;
  }
  
  .step-icon {
    width: 25px;
    height: 25px;
  }
}
</style> 