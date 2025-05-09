<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide} from 'vue3-carousel';
import SocialLinks from '@/components/socialLinks/SocialLinks.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import type { PropType } from 'vue';
import WhiteButton from '@/components/common/Buttons/WhiteButton.vue';

const props = defineProps({
  images: {
    type: Array as PropType<string[]>,
    required: true,
  },
  address: {
    type: String,
    required: true,
  },
  linkAddress: {
    type: String,
    required: true,
  },
  phone: {
    type: String,
    required: true,
  },
});

function clickButtonPhone() {
  window.open(`tel:${props.phone}`, '_self')
}
</script>

<template>
  <section class="shop-contacts">
    <Carousel
      :transition="600"
      :gap="10"
      :autoplay="2000"
      class="carousel carousel-button shop-contacts__carousel"
      wrap-around
      :mouse-drag="false"
      :touch-drag="false"
      :items-to-scroll="1"
      :items-to-show="1"
    >
      <Slide
        v-for="(image, index) in props.images"
        :key="index"
        class="blog-carousel__slide"
      >
        <img
          :src="image"
          alt="Shop image"
          class="shop-contacts__carousel-image"
        >
      </Slide>

      <template #addons>
        <CarouselPagination class="shop-contacts__carousel-pagination" />
      </template>
    </Carousel>

    <div class="shop-contacts__info">
      <div class="shop-contacts__info-item shop-contacts__info-item_title">
        <span class="shop-contacts__title">Наш магазин</span>
      </div>

      <div class="shop-contacts__info-item shop-contacts__info-item_address">
        <span>Адрес:</span>

        <a
          :href="props.linkAddress"
          target="_blank"
          class="shop-contacts__address"
        >{{ props.address }}</a>
      </div>

      <div class="shop-contacts__info-item shop-contacts__info-item_phone">
        <span>Звонки по РФ:</span>

        <a :href="`tel:${props.phone}`" class="shop-contacts__phone">{{ props.phone }}</a>
      </div>

      <div class="shop-contacts__info-item shop-contacts__info_social">
        <span>Социальные сети:</span>

        <SocialLinks class="shop-contacts__social" />
      </div>

      <div class="shop-contacts__info-item shop-contact__info_button">
        <WhiteButton
          text="Позвонить"
          height="45px"
          class="w-100"
          @click="clickButtonPhone"
        />

        <XSBlueButton
          class="w-100"
          text="Подписаться на новости"
          height="45px"
        />
      </div>
    </div>
  </section>
</template>

<style scoped>
.shop-contacts {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.shop-contacts__carousel-image {
  display: block;
  border-radius: 16px;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 250px;
}

.shop-contacts__carousel-pagination {
  right: 16px;
  bottom: 16px;
  left: auto;
  transform: none;
}

.shop-contacts__info {
  background-color: var(--gray-200-color);
  border-radius: 16px;
  padding: 16px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.shop-contacts__title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.shop-contacts__info-item {
  display: flex;
  flex-direction: column;
  gap: 6px;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.shop-contacts__address {
  font-weight: 800;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.02em;
  text-decoration: underline;
  color: var(--black-color);
}

.shop-contacts__phone {
  font-weight: 800;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.shop-contact__info_button {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: 14px;
}

.shop-contacts__social {
  margin-top: 4px;
}

@media (min-width: 768px) {
  .shop-contacts__carousel-image {
    height: 300px;
  }

  .shop-contacts__carousel-pagination {
    right: 30px;
    bottom: 30px;
  }

  .shop-contacts__info-item_title {
    grid-area: title;
  }

  .shop-contacts__info-item_address {
    grid-area: address;
  }

  .shop-contacts__info-item_phone {
    grid-area: phone;
    width: calc(50% - 8px);
    margin-left: auto;
  }

  .shop-contacts__info_social {
    grid-area: social;
    margin-top: auto;
  }

  .shop-contact__info_button {
    grid-area: button;
  }

  .shop-contacts__info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-areas:
      "title address"
      "phone phone"
      "social button";
    padding: 30px;
  }

  .shop-contacts__address {
    font-size: 20px;
    line-height: 24px;
  }
}

@media (min-width: 1024px) { 
  .shop-contacts{
    gap: 30px;
    display: grid;
    grid-template-columns: minmax(574px, max-content) 360px;
  }

  .shop-contacts__carousel-image {
    height: 450px;
  }

  .shop-contacts__info {
    display: flex;
  }

  .shop-contacts__title {
    font-size: 34px;
    line-height: 41px;
  }

  .shop-contact__info_button {
    margin-top: 19px;
  }

  .shop-contacts__info-item_phone {
    width: auto;
    margin-left: 0;
  }
}
</style>