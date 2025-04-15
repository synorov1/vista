<template>
  <div :class="$style.share">
    <button :class="$style.shareBtn">
      Поделиться корзиной
    </button>
  </div>
</template>

<script setup lang="ts">

</script>

<style module>
.shareBtn {
  width: 100%;
  padding: 14px;
  background: #F0F0F0;
  border-radius: 6px;
  border: none;
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #A0A0A0;
  cursor: pointer;
}
</style>