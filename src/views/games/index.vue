<template>
  <div class="page-container">
    <div class="sidebar">
      <Sidebar
        v-model="selectedCity"
        :select-values="data.cities"
      />
    </div>
    <div class="content">
      <GradientBanner
        :title="data.bannerTitle"
        :subtitle="data.bannerSubtitle"
      />
      <Select
        v-model="selectedCity"
        class="select"
        :options="data.cities"
        placeholder="Выберите город"
      />
      <div class="map" />
      <div class="points">
        <PointBlock
          v-for="(item, idx) in visiblePoints"
          :key="idx"
          :title="item.title"
          :subtitle="item.subtitle"
          :address="item.address"
          :phone-number="item.phoneNumber"
          :description="item.description"
          :link="item.link"
          :img="item.img"
        />
      </div>
      <SquareButton
        v-if="visiblePoints.length < data.points.length"
        text="Показать ещё"
        class="more-button"
        @click="loadMore"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";
import data from "./games.json";
import GradientBanner from "@/components/common/GradientBanner.vue";
import PointBlock from "./pointBlock/index.vue";
import Sidebar from "./sidebar/index.vue";
import SquareButton from "@/components/common/Buttons/SquareButton.vue";
import Select from "@/components/Select.vue";
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Игры');

const selectedCity = ref("Москва");

const initialCount = 4;
const step = 2;

const visibleCount = ref(initialCount);
const visiblePoints = computed(() => data.points.slice(0, visibleCount.value));

const loadMore = () => {
  if (visibleCount.value < data.points.length) {
    visibleCount.value += step;
  }
};
</script>

<style scoped>
  .page-container {
    display: grid;
    grid-template-columns: 300px 1fr;
    margin-bottom: 80px;
    gap: 30px;
  }

  .content {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .select {
    display: none;
  }

  .map {
    min-height: 340px;
    border: 1px solid var(--gray-400-color);
    border-radius: 20px;
  }

  .points {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
  }

  .more-button {
    width: 100%;
  }

  @media screen and (max-width: 768px) {
    .sidebar {
      display: none;
    }
    .select {
      display: block;
    }
  }
</style>