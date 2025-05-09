<template>
  <div class="shop">
    <ShopContacts
      :images="data.contacts.images"
      :address="data.contacts.address"
      :link-address="data.contacts.linkAddress"
      :phone="data.contacts.phone"
      class="shop__contacts"
    />

    <ShopDescription
      :text="data.description.text"
      :items="data.description.cards"
      class="shop__description"
    />

    <ShopMain :list="data.main.items" class="shop__main" />

    <GradientBanner :title="data.banner.title" class="shop__banner">
      <template #bottom>
        <WhiteButton
          class="shop__banner-button"
          height="45px"
          text="Перейти"
        />
      </template>
    </GradientBanner>

    <div class="shop__info">
      <ImageCard
        v-for="(item, index) in data.info"
        :key="index"
        :position-image="index % 2 ? 'right' : 'left'"
        :image="item.image"
        :text="item.text"
        :title="item.title"
      />
    </div>

    <ShopMap
      :title="data.map.title"
      :text="data.map.text"
      class="shop__map"
    />

    <div v-if="data.questions.length > 0" class="shop__questions">
      <Accordion
        v-for="(item, index) in data.questions"
        :key="index"
        :title="item.title"
      >
        <template #content>
          <p class="m-0" v-html="item.text" />
        </template>
      </Accordion>
    </div>
  </div>
</template>

<script setup lang="ts">
import ImageCard from '@/components/cards/ImageCard.vue';
import WhiteButton from '@/components/common/Buttons/WhiteButton.vue';
import GradientBanner from '@/components/common/GradientBanner.vue';
import ShopContacts from '@/components/shop/ShopContacts.vue';
import ShopDescription from '@/components/shop/ShopDescription.vue';
import ShopMain from '@/components/shop/ShopMain.vue';
import ShopMap from '@/components/shop/ShopMap.vue';
import Accordion from '@/components/common/Accordion.vue';
import data from '@/views/shop/shop.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Магазин');
</script>

<style scoped>
.shop__contacts,
.shop__description,
.shop__banner,
.shop__info,
.shop__map,
.shop__questions {
  margin-bottom: 40px;
}

.shop__main {
  margin-bottom: 70px;
}

.shop__info {
  display: flex;
  flex-direction: column;
  gap: 40px;
}

.shop__banner-button {
  width: 100%;
  margin-top: 10px;
}

.shop__questions {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

@media (min-width: 768px) {
  .shop__contacts,
  .shop__description,
  .shop__banner,
  .shop__info,
  .shop__map,
  .shop__questions {
    margin-bottom: 60px;
  }

  .shop__info {
    gap: 60px;
  }

  .shop__main {
    margin-bottom: 90px;
  }

  .shop__banner-button {
    width: 170px;
    margin-top: 25px;
  }
}

@media (min-width: 1024px) {
  .shop__contacts,
  .shop__description,
  .shop__banner,
  .shop__info,
  .shop__map,
  .shop__questions {
    margin-bottom: 80px;
  }
}

@media (min-width: 1440px) {
  .shop__contacts {
    margin-bottom: 120px;
  }

  .shop__info {
    gap: 100px;
  }

  .shop__description,
  .shop__banner,
  .shop__info,
  .shop__map,
  .shop__questions {
    margin-bottom: 100px;
  }

  .shop__main {
    margin-bottom: 97px;
  }
}
</style>
