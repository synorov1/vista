<template>
    <div class="container">
      <Header></Header>
        <slot></slot>
      <Footer></Footer>
    </div>
  </template>
  
  <script setup lang="ts">
  import Header from '~/components/layouts/Header.vue';
  import Footer from '~/components/layouts/Footer.vue';
  </script>
  
  <style>
  .container {
    gap: 10px;
    display: flex;
    flex-direction: column;
  }
  </style>
  