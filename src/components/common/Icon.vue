<template>
  <div class="icon">
    <slot />
  </div>
</template>

<style scoped>
.icon {
  display: inline-block;
  min-height: 1em;
  min-width: 1em;
  flex-shrink: 0;
  color: currentColor;
  text-align: center;
  line-height: 0;
}
</style>
