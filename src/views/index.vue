<template>
  <div class="section">
    <router-link class="link" to="/catalog">/catalog</router-link>
    <router-link class="link" to="/components">/components</router-link>
    <router-link class="link" to="/404">/404</router-link>
    <router-link class="link" to="/returns">/returns</router-link>
    <router-link class="link" to="/delivery">/delivery</router-link>
    <router-link class="link" to="/services">/services</router-link>
    <router-link class="link" to="/service">/service</router-link>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.section {
  margin-bottom: 100px;
  display: flex;
  flex-direction: column;
}
.link {
  font-size: 30px;
  font-weight: 500;
  margin-bottom: 10px;
}

</style>
