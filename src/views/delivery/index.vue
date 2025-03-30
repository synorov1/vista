<template>
  <div class="page-container">
    <GradientBanner
      :title="data.bannerTitle"
      :subtitle="data.bannerSubtitle"
    />
    <div class="discount-block">
      <TitleWithButton
        :title="data.discountTitle"
        :button-text="data.discountButtonText"
        :on-button-click="onButtonClick"
      />
      <p>{{ data.paragraph_1 }}</p>
      <div class="discount-info-blocks">
        <GrayInfoBlock
          v-for="(item, index) in data.infoBlocks"
          :key="index"
          :title="item.title"
          :subtitle="item.subtitle"
        >
          <div v-html="item.slot" />
        </GrayInfoBlock>
      </div>
    </div>
    <div class="delivery-block">
      <TitleWithButton
        :title="data.deliveryTitle"
        :button-text="data.deliveryButtonText"
        :on-button-click="onButtonClick"
      />
      <p>{{ data.paragraph_2 }}</p>
      <MoreBlock
        :initial-count="6"
        :increment-count="3"
        :cards="data.deliveryCards"
      />
    </div>
    <div class="adv-block">
      <ReklamaItem
        :title="data.advItem.title_1"
        :image-src="data.advItem.image_1"
        :description="data.advItem.descr_1"
      />
      <ReklamaItem
        :title="data.advItem.title_2"
        :image-src="data.advItem.image_2"
        :description="data.advItem.descr_2"
        background-color="var(--blue-400-color)"
        text-color="white"
      >
        <p class="reklama-promo">
          {{ data.advItem.promo_2 }}
        </p>
      </ReklamaItem>
    </div>
    <div class="payment-block">
      <TitleWithButton
        :title="data.paymentTitle"
        :button-text="data.paymentButtonText"
        :on-button-click="onButtonClick"
      />
      <p>{{ data.paragraph_3 }}</p>
      <MoreBlock
        :initial-count="3"
        :increment-count="3"
        :cards="data.paymentCards"
      />
    </div>
    <div class="safety-block">
      <TitleWithButton
        :title="data.safetyTitle"
        :button-text="data.safetyButtonText"
        :on-button-click="onButtonClick"
      />
      <p v-for="(paragraph, index) in data.safetyContent" :key="index">
        {{ paragraph }}
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Доставка');

import GradientBanner from "@/components/common/GradientBanner.vue";
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import GrayInfoBlock from "@/components/common/GrayInfoBlock.vue";
import MoreBlock from "./moreBlock/index.vue";
import ReklamaItem from "@/components/layouts/Reklama/ReklamaItem.vue";
import data from "./delivery.json";

const onButtonClick = () => console.log('click');

</script>

<style scoped>
.page-container{
  display: flex;
  flex-direction: column;
  gap: 60px;
  margin-top: 30px;
  margin-bottom: 100px;
}

.discount-block {
  display: flex;
  flex-direction: column;
  gap: 30px;
  margin-top: 40px;
}

.discount-info-blocks {
  display: flex;
  flex-direction: row;
  gap: 30px;
  flex-wrap: wrap;
}

.discount-info-blocks > div {
  flex-grow: 1;
}

::v-deep(.discount-info-block-main p) {
  color: var(--gray-800-color);
  margin: 0;
}

::v-deep(.discount-info-block-main p strong){
  color: var(--black-color);
}

.discount-info-block-secondary {
  margin-top: 20px;
  font-size: 12px;
  font-weight: 400;
  line-height: 18px;
  color: var(--gray-800-color);
}

.discount-info-block-secondary > p {
  margin: 0;
}

.delivery-block {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.adv-block {
  display: flex;
  flex-direction: row;
  gap: 30px;
  flex-wrap: wrap;
}

.reklama-promo {
  padding: 6px 10px;
  background-color: var(--white-color);
  font-size: 14px;
  font-weight: 700;
  line-height: 17px;
  border-radius: 30px;
}

.payment-block {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.safety-block {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.safety-block > p {
  margin: 0;
  color: var(--gray-800-color);
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
}

.more-block-paragraph {
  max-width: 320px;
}
</style>