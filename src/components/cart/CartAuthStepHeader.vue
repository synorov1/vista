<template>
  <div class="cart-step-header">
    <div class="back-to-cart">
      <router-link to="/cart">
        <button type="button">
          Вернуться в корзину
        </button>
      </router-link>
    </div>
    <div class="logo">
      <img
        src="/src/assets/images/main-logo.webp"
        srcset="/src/assets/images/main-logo@2x.webp 2x"
        alt="vistasport"
      >
    </div>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.cart-step-header {
  display: flex;
  position: relative;
  align-items: center;
  justify-content: flex-start;
  margin: 30px 0 42px 0;
}

.back-to-cart {
  height: 100%;
  width: 100%;
  display: flex;
}
.back-to-cart button {
  display: flex;
  height: 45px;
  border-radius: 6px;
  padding: 14px;
  background: #f0f0f0;
  color: #A0A0A0;
  font-weight: 600;
  font-size: 14px;
  line-height: 100%;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.logo {
  width: 100%;
  display: flex;
  justify-content: center;
  position: absolute;
  margin: 0 auto;
  pointer-events: none;
}

@media (max-width: 1024px) {
  .logo img {
    margin-left: auto;
  }
}

@media (max-width: 402px) {
  .logo img {
    margin-left: unset;
    margin-right: auto;
  }
  .logo {
    position: relative;
  }
  .cart-step-header {
    flex-direction: column-reverse;
    margin: 20px 0;
    gap: 20px;
  }
}
</style>