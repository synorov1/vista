<template>
  <div class="menu-column row">
    <div v-for="(column, cIndex) in preparedMenu" :key="cIndex" class="col">
      <div class="menu-item" v-for="(category, index) in column" :key="index">
        <a class="menu-item-header" :href="category.link">{{category.text}}</a>
        <div v-for="(subItem, subIndex) in category.subMenu" :key="subIndex" class="menu-item-sub">
          <a :href="subItem.link">{{ subItem.text }}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { PropType } from 'vue';
import { computed, toRef } from 'vue';
import type { MenuItem } from './MenuFooter.vue';

  const props = defineProps({
    menuData: {
      type: Array as PropType<MenuItem[]>,
      required: true
    }
  })

  const menuData = toRef(props, 'menuData');
  const columns = [2, 2, 2, 3, 2];

  const preparedMenu = computed(() => {
    const result = [];
    let index = 0;

    for (let i = 0; i < columns.length; i++) {
        const columnSize = columns[i];
        const columnItems = [];

        for (let j = 0; j < columnSize; j++) {
            if (index < menuData.value.length) {
                columnItems.push(menuData.value[index]);
                index++;
            }
        }

        result.push(columnItems);
    }

    return result;
  });
</script>

<style scoped>
:root {
  --bs-accordion-border-color: red;
}

.menu-column {
  padding: 0px;
  margin: 0 auto;
  width: 100%;
  height: auto;
  flex: none;
  order: 0;
  flex-grow: 0;
}

.menu-item {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 20px;
  width: auto;
  height: auto;
  flex: none;
  order: 0;
  flex-grow: 0;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}
.menu-item:not(:last-of-type) {
  margin-bottom: 40px;
}

.menu-item-header {
  font-weight: 800;
  font-size: 16px;
  line-height: 19px;
  color: var(--black-color);
  margin-bottom: 10px;
  text-decoration: none;
}

.menu-item-sub {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
}
.menu-item-sub a {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
  text-decoration: none;
}
</style>
