<script lang="ts" setup>
import SocialLinksItem from '@/components/socialLinks/SocialLinksItem.vue';
import data from './socialLinks.json';
</script>

<template>
  <div class="social-links">
    <SocialLinksItem
      v-for="link in data"
      :key="link.href"
      v-bind="link"
    />

    <slot name="additionally" />
  </div>
</template>

<style scoped>
.social-links {
  display: flex;
  gap: 14px;
}
</style>