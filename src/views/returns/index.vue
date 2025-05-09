<template>
  <div :class="$style.pageContainer">
    <GradientBanner
      :title="data.bannerTitle"
      :subtitle="data.bannerSubtitle"
    />
    <TitleWithButton
      :title="data.title"
      :button-text="data.buttonText"
      :on-button-click="onTitleButtonClick"
    />
    <p :class="$style.text">
      {{ data.paragraph_1 }}
    </p>
    <List
      :title="data.listTitle"
      :list="data.listItems"
    />
    <div :class="$style.blocksContainer">
      <GrayInfoBlock
        v-for="(item, index) in data.infoBlocks"
        :key="index"
        :title="item.title"
        :subtitle="item.subtitle"
      >
        <template v-for="(slot, slotIndex) in item.slots" :key="slotIndex">
          <p :class="$style.blockText" v-html="slot" />
        </template>
      </GrayInfoBlock>
    </div>
    <p :class="$style.text">
      {{ data.paragraph_2 }}
    </p>
  </div>
</template>

<script setup lang="ts">
import GradientBanner from "@/components/common/GradientBanner.vue";
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import List from "@/components/common/List.vue";
import GrayInfoBlock from "@/components/common/GrayInfoBlock.vue";
import data from './returns.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Возврат товара');
import { useQuestionModal } from '@/composables/useModal'

const { openQuestionModal } = useQuestionModal()

const onTitleButtonClick = () => {
  openQuestionModal()
}

</script>

<style module>
.pageContainer {
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

.blocksContainer {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
}

.blocksContainer > * {
  flex: 1;
  min-width: 300px;
}

.blockText {
  margin-bottom: 25px;
}

.blockText:last-child {
  margin-bottom: 0;
}
</style>