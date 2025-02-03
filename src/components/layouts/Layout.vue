<template>
    <div class="layout">
      <Header></Header>
      <div class="container">
        <Breadcrumbs />
        <slot></slot>
      </div>
      <Footer></Footer>
    </div>
  </template>
  
  <script setup lang="ts"> 
  import Header from '~/components/layouts/Header/index.vue';
  import Footer from '~/components/layouts/Footer.vue';
  import Breadcrumbs from "@/components/Breadcrumbs.vue";
  </script>
  
  <style>
  .container {
    gap: 10px;
    display: flex;
    flex-direction: column;

    @media (min-width: 1400px) {
        max-width: 1224px; /* Устанавливаем максимальную ширину */
    }
  }
  </style>
  