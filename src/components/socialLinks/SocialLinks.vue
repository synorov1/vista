<template>
  <div :class="$style.socialLinks">
    <SocialLinksItem
      v-for="link in data"
      :key="link.href"
      v-bind="link"
    />

    <slot name="additionally" />
  </div>
</template>

<script lang="ts" setup>
import SocialLinksItem from '@/components/socialLinks/SocialLinksItem.vue';
import data from './socialLinks.json';
</script>

<style module>
.socialLinks {
  display: flex;
  gap: 14px;
}
</style>