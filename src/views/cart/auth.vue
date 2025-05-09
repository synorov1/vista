<template>
  <section :class="$style.section">
    <CartAuthStepHeader />
    <CartLayout :step="1">
      <CartAuthForm />
    </CartLayout>
  </section>
</template>

<script setup lang="ts">
import CartAuthForm from '@/components/cart/CartAuthForm.vue';
import CartAuthStepHeader from '@/components/cart/CartAuthStepHeader.vue';
import CartLayout from '@/components/layouts/CartLayout.vue';
</script>

<style module>
.section {
  margin-bottom: 60px;
}
</style>
    