<script setup lang="ts">
import type {CatalogItem} from "./index"
import type {PropType} from "vue";

  defineProps({
    activeTab: {
      type: Object as PropType<CatalogItem | null>,
      required: true
    }
  })
</script>

<template>
  <div class="catalog-tabs-menu-sub-panel">
    <div class="catalog-tabs-menu-sub-panel-title-box">
      <h3 class="catalog-tabs-menu-sub-panel-title"> {{ activeTab?.title }} </h3>
      <p class="catalog-tabs-menu-sub-panel-text" v-if="activeTab?.value"> {{ activeTab?.value }} </p>
    </div>

    <div class="catalog-tabs-menu-sub-list">
      <a
          :href="item.link"
          v-for="(item, index) in activeTab?.childItems"
          :key="index"
          class="catalog-tabs-menu-sub-list-item"
      >
        <p>{{ item.title }}</p>
      </a>
    </div>
  </div>
</template>

<style scoped>
.catalog-tabs-menu-sub-list-item {
  cursor: pointer;

  p {
    font-size: 14px;
    font-weight: 600;
    color: var(--gray-600-color);
    margin-bottom: 0 !important;
  }
}

.catalog-tabs-menu-sub-list-item:hover {
  p {
    color: var(--black-color);
    transition: all .3s;
  }
}

.catalog-tabs-menu-sub-panel {
  padding-top: 30px;
}

.catalog-tabs-menu-sub-panel-title-box {
  display: flex;
  align-items: flex-end;
  gap: 0 10px;
  margin-bottom: 20px;
}

.catalog-tabs-menu-sub-list {
  display: flex;
  flex-direction: column;
  gap: 20px 0;
}

.catalog-tabs-menu-sub-panel-title {
  font-size: 26px;
  font-weight: 800;
  color: var(--black-color);
  margin-bottom: 0 !important;
}

.catalog-tabs-menu-sub-panel-text {
  font-size: 14px;
  font-weight: 600;
  color: var(--gray-600-color);
  margin: 0 !important;
}
</style>