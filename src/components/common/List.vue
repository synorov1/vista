<template>
  <div class="list-container">
    <p class="title">
      {{ title }}
    </p>
    <ul class="list">
      <li
        v-for="(item, index) in list"
        :key="index"
        class="item"
      >
        <div class="item-dot" />
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
defineProps({
  title: {
    type: String,
    default: '',
  },
  list: {
    type: Array,
    required: true,
  },
});
</script>

<style scoped>
.list-container {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.title {
  font-size: 26px;
  font-weight: 800;
  line-height: 31px;
  margin: 0;
}
.list {
  list-style: none;
  margin: 0;
  padding: 0;
  color: var(--gray-800-color);
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.item {
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.item-dot {
  flex-shrink: 0;
  align-self: baseline;
  background-image: url("src/assets/icons/check-circle.svg");
  background-repeat: no-repeat;
  width: 30px;
  height: 30px;
}
</style>