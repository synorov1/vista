<template>
    <section class="section">
      <OrderProgressComponent />
  
      <CartComponent />
  
      <OrderSummaryComponent />
    </section>
  </template>
  
  <script setup lang="ts">
  import CartComponent from '@/components/CartComponent.vue'
  import OrderProgressComponent from '@/components/OrderProgressComponent.vue'
  import OrderSummaryComponent from '@/components/OrderSummaryComponent.vue'
      
      
  </script>
  
  <style scoped>
  .section {
      margin-bottom: 60px;
  }
  
  </style>
      