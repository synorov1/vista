<script setup lang="ts">
import catalogItems from './catalogItems.json'
import {type Ref, ref} from "vue";
import CatalogTabsPanel from "@/components/catalog/CatalogTabsPanel.vue";
import type {CatalogItem} from "./index"

const activeTab: Ref<CatalogItem | null> = ref(null);

  const setActiveTab = (item: CatalogItem | null) => {
      activeTab.value = item?.childItems.length ? item : null
  }
</script>

<template>
  <div class="catalog-tabs-menu">
    <div class="catalog-tabs-menu-main-panel">
    <h3 class="catalog-tabs-menu-title">Каталог</h3>

    <div class="catalog-tabs-menu-list">
      <a
        :href="item.link || '#'"
        @click="setActiveTab(item)"
        v-for="(item, index) in catalogItems"
        :key="index"
        :class="[
            'catalog-tabs-menu-list-item',
            {'active': activeTab?.key === item.key},
            {'no-arrow': !item.childItems.length},
        ]"
      >
        <p>{{ item.title }}</p>

      </a>
    </div>
    </div>

    <CatalogTabsPanel :active-tab="activeTab" />
</div>
</template>

<style scoped>
  .catalog-tabs-menu {
    display: flex;
    gap: 40px;
  }

  .catalog-tabs-menu-main-panel {
    width: 290px;
    padding: 30px;
    border: 1px solid rgb(217, 217, 217);
    border-radius: 20px;
  }

  .catalog-tabs-menu-title {
    font-size: 26px;
    font-weight: 800;
    padding-left: 14px;
    margin-bottom: 10px;
  }

  .catalog-tabs-menu-list {
    width: 230px;
  }

  .catalog-tabs-menu-list-item {
    display: block;
    color: var(--black-color);
    position: relative;
    width: 100%;
    padding: 14px;
    border-radius: 6px;
    cursor: pointer;

    p {
      width: 185px;
      font-size: 14px;
      font-weight: 600;
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
      margin-bottom: 0 !important;
    }
  }

  .catalog-tabs-menu-list-item:after {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 14px;
    width: 7px;
    padding: 10px;
    background: url("/src/assets/icons/gray-arrow-right.svg") no-repeat center center;
  }

  .catalog-tabs-menu-list-item.active {
    background: var(--gray-50-color);
  }

  .catalog-tabs-menu-list-item.no-arrow:after {
    background: none;
  }
</style>