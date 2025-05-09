<template>
  <div class="layout">
    <Header v-if="showHeader" />
    <div class="container">
      <Breadcrumbs v-if="showBreadcrumbs" />
      <slot />
    </div>
    <Footer />
  </div>
</template>
  
<script setup lang="ts"> 
import Header from '~/components/layouts/Header/index.vue';
import Footer from '~/components/layouts/Footer.vue';
import Breadcrumbs from "@/components/Breadcrumbs.vue";

interface Props {
  showBreadcrumbs?: boolean;
  showHeader?: boolean
}

withDefaults(defineProps<Props>(), {
  showBreadcrumbs: true,
  showHeader: true
});
</script>

<style>
@layer layout {
  .container {
    gap: 10px;
    display: flex;
    flex-direction: column;

    @media (min-width: 1400px) {
        max-width: 1224px; 
    }
  }
}
</style>
  