<template>
  <div>
    <h3>Buttons</h3>
    <MenuButton text="Текст" />
    <RoundButton text="Текст" />
    <SquareButton text="Текст" />
    <XSBlueButton text="Текст" />
    <BlackArrowButton text="Текст" />
    <GreyButton text="Текст" />
    <WhiteButton text="Текст" />
    <HomeButton text="Текст" />
    <LeftArrowButton />
    <RightArrowButton />
    <TextArrowButton text="Текст" />
    <YesNoButton :isAvailable="true" />
    <YesNoButton :isAvailable="false" />
    <Link text="Задать вопрос" href="/" />
    <Link text="Задать вопрос" @click="() => { console.log('click') }" />
    <div class="row">
      <Label class="col-1" color="red" text="Текст" />
      <Label class="col-1" color="blue" text="Текст" />
      <Label class="col-1" color="black" text="Текст" />
    </div>
    <h3>Labels</h3>
    <SaleLabel :currentPrice="1000" :oldPrice="1500" />
    <Delivery text="Доставка по РФ" />
    <Star text="Star" />
    <Time time="12:30" />
    <h3>Icons</h3>
    <Like :liked="true" />
    <Like :liked="false" />
    <ReklamaContainer>
      <ReklamaItem
        title="Рекламный пост о продукте 1"
        description="Красивое и понятное пояснение о товаре с призывом его купить"
        imageSrc="@/assets/images/racket.png"
        backgroundColor="var(--gray-200-color)"
        :reverse="true"
      >
        <template #label>
          <label>Ваш компонент label 1</label>
        </template>
      </ReklamaItem>
      <ReklamaItem
        title="Рекламный пост о продукте 2"
        description="Красивое и понятное пояснение о товаре с призывом его купить"
        imageSrc="@/assets/images/racket.png"
        backgroundColor="var(--blue-400-color)"
        textColor="white"
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
    <TitleWithButton title="Title text" button-text="Button text" :on-button-click=onTitleButtonClick />
    <List
        title="List title:"
        :list=mockList
    />
    <GrayInfoBlock title="Block title" subtitle="Block subtitle">
      <p>Slot text</p>
    </GrayInfoBlock>
  </div>
</template>

<script setup lang="ts">
import MenuButton from '~/components/common/buttons/MenuButton.vue';
import RoundButton from '~/components/common/buttons/RoundButton.vue';
import SquareButton from '~/components/common/buttons/SquareButton.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import BlackArrowButton from '~/components/common/buttons/BlackArrowButton.vue';
import GreyButton from '~/components/common/buttons/GreyButton.vue';
import WhiteButton from '~/components/common/buttons/WhiteButton.vue';
import HomeButton from '~/components/common/buttons/HomeButton.vue';
import LeftArrowButton from '~/components/common/buttons/LeftArrowButton.vue';
import RightArrowButton from '~/components/common/buttons/RightArrowButton.vue';
import TextArrowButton from '~/components/common/buttons/TextArrowButton.vue';
import Label from '~/components/common/Label.vue';
import SaleLabel from '~/components/common/SaleLabel.vue';
import YesNoButton from '~/components/common/buttons/YesNoButton.vue';
import Star from '~/components/common/Star.vue';
import Link from '@/components/common/Link.vue';
import Like from '~/components/common/Like.vue';
import Time from '~/components/common/Time.vue';
import Delivery from '~/components/common/Delivery.vue';
// import InputFormFooter from '~/components/layouts/Footer/InputFormFooter.vue';
// import ContactsFooter from '~/components/layouts/Footer/ContactsFooter.vue';
import ReklamaContainer from '~/components/layouts/Reklama/ReklamaContainer.vue';
import ReklamaItem from '~/components/layouts/Reklama/ReklamaItem.vue';
import GradientBanner from "@/components/common/GradientBanner.vue";
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import List from "@/components/common/List.vue";
import GrayInfoBlock from "@/components/common/GrayInfoBlock.vue";

const buttonTexts = [
  'Andro',
  'Butterfly',
  'DHS',
  'Donic',
  'Dr. Neubauer',
  'Gewo',
  '729',
  'Friendship',
  'Gewo',
  'Joola',
  'Materialspezialist',
  'Nittaku',
  'Spinlord',
  'Stiga',
  'Tibhar',
  'Victas',
  'Xiom',
  'Yasaka',
  'Yinhe'
];

const radioOptions = [
  'Новинки',
  'Популярные',
  'Дешевые',
  'Дорогие',
  'Скидки',
  'Высокий рейтинг'
];

const onTitleButtonClick = () => console.log('TitleWithButton click')

const mockList = ['item1', 'item2', 'item3']

</script>

<style scoped>
.cards {
  display: flex;
}
</style>
