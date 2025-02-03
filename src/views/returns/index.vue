<template>
  <div class="page-container">
    <GradientBanner
        :title=data.bannerTitle
        :subtitle=data.bannerSubtitle
    />
    <TitleWithButton
        :title=data.title
        :button-text=data.buttonText
        :on-button-click=onTitleButtonClick
    />
    <p class="text">{{data.paragraph_1}}</p>
    <List
        :title=data.listTitle
        :list=data.listItems
    />
    <div class="blocks-container">
      <GrayInfoBlock v-for="(item, index) in data.infoBlocks" :key="index" :title=item.title :subtitle="item.subtitle">
        <template v-for="(slot, slotIndex) in item.slots" :key="slotIndex">
          <p class="block-text" v-html="slot" />
        </template>
      </GrayInfoBlock>
    </div>
    <p class="text">{{data.paragraph_2}}</p>
  </div>
</template>

<script setup lang="ts">
import GradientBanner from "@/components/common/GradientBanner.vue";
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import List from "@/components/common/List.vue";
import GrayInfoBlock from "@/components/common/GrayInfoBlock.vue";
import data from './returns.json';

const onTitleButtonClick = () => console.log('Задать вопрос: click');

</script>

<style scoped>
.page-container {
  display: flex;
  flex-direction: column;
  gap: 30px;
  margin-top: 30px;
  margin-bottom: 80px;
}

.text {
  color: var(--gray-800-color);
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
}

.link {
  text-decoration: none;
  color: var(--blue-400-color);
}

.blocks-container {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
}

.blocks-container > * {
  flex: 1;
  min-width: 300px;
}

.block-text {
  margin-bottom: 25px;
}
.block-text:last-child {
  margin-bottom: 0;
}
</style>