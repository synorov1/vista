<template>
  <div class="components-page">
    <section class="section">
      <h3 class="section-title">
        Buttons
      </h3>
      <div class="controls-grid">
        <MenuButton text="Текст" />
        <RoundButton text="Текст" />
        <SquareButton text="Текст" />
        <BlackButton text="Текст" />
        <XSBlueButton text="Текст" />
        <BlackArrowButton text="Текст" />
        <GreyButton text="Текст" />
        <GreyButton text="Текст" type="secondary" />
        <WhiteButton text="Текст" />
        <HomeButton text="Текст" />
        <LeftArrowButton />
        <RightArrowButton />
        <TextArrowButton text="Текст" />
        <RedButton text="Текст" />
        <YesNoButton :is-available="true" />
        <YesNoButton :is-available="false" />
        <Link text="Задать вопрос" href="/" />
        <Link text="Задать вопрос" @click="openQuestionModal" />
      </div>
    </section>

    <section class="section">
      <h3 class="section-title">
        Labels
      </h3>
      <div class="controls-grid">
        <div class="row">
          <Label
            class="col-1"
            color="red"
            text="Текст"
          />
          <Label
            class="col-1"
            color="blue"
            text="Текст"
          />
          <Label
            class="col-1"
            color="black"
            text="Текст"
          />
        </div>
        <SaleLabel :current-price="1000" :old-price="1500" />
        <Delivery text="Доставка по РФ" />
        <Star text="Star" />
        <Time time="12:30" />
        <Bread text="Bread" />
        <Sale text="Sale" />
        <RedLabel discount="1" />
      </div>
    </section>

    <section class="section">
      <h3 class="section-title">
        Icons
      </h3>
      <div class="controls-grid">
        <Like :liked="true" />
        <Like :liked="false" />
        <Date date="10.02.2024" />
      </div>
    </section>

    <section class="section">
      <h3 class="section-title">
        Banners
      </h3>
      <ReklamaContainer>
        <ReklamaItem
          title="Рекламный пост о продукте 1"
          description="Красивое и понятное пояснение о товаре с призывом его купить"
          image-src="@/assets/images/racket.png"
          background-color="var(--gray-200-color)"
          :reverse="true"
        >
          <template #label>
            <label>Ваш компонент label 1</label>
          </template>
        </ReklamaItem>
        <ReklamaItem
          title="Рекламный пост о продукте 2"
          description="Красивое и понятное пояснение о товаре с призывом его купить"
          image-src="@/assets/images/racket.png"
          background-color="var(--blue-400-color)"
          text-color="white"
        >
          <template #label>
            <label>Ваш компонент label 2</label>
          </template>
        </ReklamaItem>
      </ReklamaContainer>

      <GradientBanner
        title="Title text"
        subtitle="Subtitle text"
      />
    </section>

    <section class="section">
      <h3 class="section-title">
        Controls
      </h3>
      <div class="controls-grid">
        <TitleWithButton
          title="Title text"
          button-text="Button text"
          :on-button-click="onTitleButtonClick"
        />
        <Tabs v-model="tabModel" :list="[{ id: 1, title: 'tab 1'}, { id: 2, title: 'tab 2' }, { id: 3, title: 'tab 3' }]" />
        <TtileWithArrow
          title="Title text"
          button-text="Button text"
          :button-click="onTitleButtonClick"
        />
        <Accordion title="title">
          <template #content>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam iste nisi autem ea, a, obcaecati ex blanditiis aliquam maiores porro quia dolorem tenetur odio sapiente vero non veniam, in dicta?
          </template>
        </Accordion>
        <List
          title="List title:"
          :list="mockList"
        />
        <GrayInfoBlock title="Block title" subtitle="Block subtitle">
          <p>Slot text</p>
        </GrayInfoBlock>
      </div>
    </section>

    <router-link to="/cart">Перейти в корзину</router-link>

    <section class="section">
      <h3 class="section-title">
        Modals
      </h3>
      <div class="modals-container">
        <!-- <BlackButton text="Открыть Text Modal" @click="openModal('text')" />
        <BlackButton text="Открыть Options Modal" @click="openModal('options')" />
        <BlackButton text="Открыть Search Modal" @click="openModal('search')" />
        <BlackButton text="Открыть Feedback Modal" @click="openModal('feedback')" /> -->
        <BlackButton text="Открыть Info Modal" @click="openDiscountInfoModal" />
        <BlackButton text="Открыть Question Modal" @click="openQuestionModal" />
        <BlackButton text="Открыть Delivery Modal" @click="openDeliveryModal" />
        <BlackButton text="Открыть Subscribe Modal" @click="openSubscribeModal" />
        <BlackButton text="Открыть Recommendation Modal" @click="openRecommendationModal" />
        <BlackButton text="Открыть Discount Modal" @click="openDiscountModal" />
        <BlackButton text="Открыть DiscountInfoModal" @click="openDiscountInfoModal" />
        <BlackButton text="Открыть SearchModal" @click="openSearchModal" />
        <BlackButton text="Открыть ReviewModal" @click="openReviewModal" />
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import { useRecommendationModal, useDiscountModal, useDiscountInfoModal, useSearchModal, useQuestionModal, useDeliveryModal, useSubscribeModal } from '@/composables/useModal';
import MenuButton from '~/components/common/buttons/MenuButton.vue';
import RoundButton from '~/components/common/buttons/RoundButton.vue';
import SquareButton from '~/components/common/buttons/SquareButton.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import BlackButton from '~/components/common/buttons/BlackButton.vue';
import BlackArrowButton from '~/components/common/buttons/BlackArrowButton.vue';
import GreyButton from '~/components/common/buttons/GreyButton.vue';
import WhiteButton from '~/components/common/buttons/WhiteButton.vue';
import HomeButton from '~/components/common/buttons/HomeButton.vue';
import LeftArrowButton from '~/components/common/buttons/LeftArrowButton.vue';
import RightArrowButton from '~/components/common/buttons/RightArrowButton.vue';
import TextArrowButton from '~/components/common/buttons/TextArrowButton.vue';
import RedButton from '~/components/common/buttons/RedButton.vue';
import Label from '~/components/common/Label.vue';
import SaleLabel from '~/components/common/SaleLabel.vue';
import YesNoButton from '~/components/common/buttons/YesNoButton.vue';
import Star from '~/components/common/Star.vue';
import Link from '@/components/common/Link.vue';
import Like from '~/components/common/Like.vue';
import Bread from '~/components/common/Bread.vue';
import RedLabel from '~/components/common/RedLabel.vue';
import Sale from '~/components/common/Sale.vue';
import Time from '~/components/common/Time.vue';
import Date from '~/components/common/Date.vue';
import Delivery from '~/components/common/Delivery.vue';
// import InputFormFooter from '~/components/layouts/Footer/InputFormFooter.vue';
// import ContactsFooter from '~/components/layouts/Footer/ContactsFooter.vue';
import ReklamaContainer from '~/components/layouts/Reklama/ReklamaContainer.vue';
import ReklamaItem from '~/components/layouts/Reklama/ReklamaItem.vue';
import GradientBanner from "@/components/common/GradientBanner.vue";
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import TtileWithArrow from "@/components/common/TtileWithArrow.vue";
import List from "@/components/common/List.vue";
import GrayInfoBlock from "@/components/common/GrayInfoBlock.vue";
import Accordion from "@/components/common/Accordion.vue";
import Tabs from '@/components/Tabs.vue';
import { ref } from 'vue';
import { usePageTitle } from '@/composables/usePageTitle';
import { useReviewModal } from '@/composables/useModal';
usePageTitle('Компоненты');

const tabModel = ref(1);

const { openRecommendationModal } = useRecommendationModal();
const { openDiscountModal } = useDiscountModal();
const { openDiscountInfoModal } = useDiscountInfoModal();
const { openQuestionModal } = useQuestionModal();
const { openDeliveryModal } = useDeliveryModal();
const { openSubscribeModal } = useSubscribeModal();
const { openSearchModal } = useSearchModal();
const { openReviewModal } = useReviewModal();

const onTitleButtonClick = () => console.log('TitleWithButton click')

const mockList = ['item1', 'item2', 'item3']

</script>

<style scoped>
.components-page {
  padding: 40px;
  background-color: var(--white-color);
}

.section {
  margin-bottom: 60px;
}

.section-title {
  font-size: 24px;
  font-weight: 600;
  color: var(--black-color);
  margin-bottom: 30px;
}

.controls-grid {
  display: grid;
  gap: 20px;
  grid-template-columns: repeat(auto-fill, auto);
  align-items: start;
}

.controls-grid > * {
  min-width: 200px;
}

.row {
  display: flex;
  gap: 10px;
  grid-column: 1 / -1;
}

.modals-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 16px;
  margin: 20px 0;
}

@media (max-width: 768px) {
  .components-page {
    padding: 20px;
  }

  .controls-grid {
    grid-template-columns: 1fr;
  }

  .controls-grid > * {
    min-width: 100%;
  }

  .modals-container {
    grid-template-columns: 1fr;
  }
}
</style>
