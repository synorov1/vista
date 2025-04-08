<template>
    <section class="section cart-layout" :class="{ 'payment-section': step === 2 }">
      <div class="cart__container">
        <div class="progress__container">
          <OrderProgressComponent :current-step="step" />
        </div>
        <slot></slot>
      </div>
      <aside>
        <OrderSummaryComponent :current-step="step" />
      </aside>
    </section>
</template>

<script setup lang="ts">
  import OrderProgressComponent from '@/components/OrderProgressComponent.vue'
  import OrderSummaryComponent from '@/components/OrderSummaryComponent.vue'

  defineProps({
    step: {
      type: Number,
      required: true,
      default: 0
    }
  })
</script>

<style scoped>
.section {
      margin-bottom: 60px;
      display: flex;
      gap: 30px;
  }

  aside {
    max-width: 288px;
    width: 100%;
  }

  .cart__container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    width: 100%;
  }

  .progress__container {
    height: 105px;
  }
  @media (max-width: 1024px) {
    .cart__container, .section {
      gap: 20px;
    }

    .payment-section {
      flex-direction: column;
    }

    .payment-section aside {
      width: 100%;
      max-width: 100%;
    }
  
  }
  @media (max-width: 768px) {
    .section {
      flex-direction: column;
    }
    aside {
      max-width: 100%;
    }
    .progress__container {
      display: none;
    }
  }

  @media (max-width: 468px) {
    .progress__container {
      display: none;
    }
  }
  
</style>