<template>
  <p class="login-modal__policy">
    Оставляя ваши данные, вы соглашаетесь с политикой конфиденциальности <router-link to="/privacy" class="login-modal__policy-link">
      ИП Макарова Елена Валерьевна
    </router-link>
  </p>
</template>

<script setup lang="ts">

</script>

<style scoped>
.login-modal__policy {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 12px;
  line-height: 100%;
  color: #000000;
  margin: 0;
}
.login-modal__policy-link {
  text-decoration: underline;
  color: #000;
}
</style>