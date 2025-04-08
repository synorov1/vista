<template>
  <section class="section">
    <CartAuthStepHeader/>
    <CartLayout :step="2">
      <CartPaymentForm/>
    </CartLayout>
  </section>
</template>

<script setup lang="ts">
import CartAuthForm from '@/components/cart/CartAuthForm.vue';
import CartAuthStepHeader from '@/components/cart/CartAuthStepHeader.vue';
import CartPaymentForm from '@/components/cart/CartPaymentForm.vue';
import CartLayout from '@/components/layouts/CartLayout.vue';
</script>

<style scoped>
.section {
    margin-bottom: 60px;
}

</style>
    