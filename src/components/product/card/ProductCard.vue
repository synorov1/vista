<template>
  <div class="product-card">
    <div class="product-card__wrapper">
      <div class="product-card__main">
        <div class="product-card__main-top">
          <div class="product-card__carousel">
            <ProductCardCarousel :images="props.images" />

            <ProductCardChips :chips="props.chips" />
          </div>

          <ProductCardInfo
            :rating="props.info.rating"
            :ratings="props.info.ratings"
            :title="props.info.title"
            :available="props.info.available"
            :text="props.info.text"
            :params="props.info.params"
          />
        </div>

        <div v-if="isDesktopScreen" class="product-card__advantages">
          <ArrowCard
            v-for="(item, index) in props.advantages"
            :key="index"
            :title="item.title"
            :text="item.text"
            :icon="item.icon"
            to="/"
          />
        </div>
      </div>

      <div class="product-card__payments">
        <ProductCardPayment
          :price="props.payment.price"
          :specifications="props.payment.specifications"
          :liked="props.payment.liked"
          :old-price="props.payment.oldPrice"
        />
      
        <ProductCardInstalment
          :price="props.instalment.price"
          :old-price="props.instalment.oldPrice"
          :label="props.instalment.label"
          :text="props.instalment.text"
          :logo="props.instalment.logo"
        />
      </div>

      <div v-if="!isDesktopScreen" class="product-card__advantages">
        <ArrowCard
          v-for="(item, index) in props.advantages"
          :key="index"
          :title="item.title"
          :text="item.text"
          :icon="item.icon"
          to="/"
        />
      </div>
    </div>

    <SocialLinks v-if="isDesktopScreen" class="product-card__social">
      <template #additionally>
        <SocialLinksItem
          image="/src/assets/icons/repost-round.svg"
          alt="repost"
        />
      </template>
    </SocialLinks>
  </div>
</template>

<script lang="ts" setup>
import ProductCardCarousel from '@/components/product/card/ProductCardCarousel.vue';
import ProductCardChips from '@/components/product/card/ProductCardChips.vue';
import ProductCardInfo from '@/components/product/card/ProductCardInfo.vue';
import ProductCardPayment from '@/components/product/card/ProductCardPayment.vue';
import ProductCardInstalment from '@/components/product/card/ProductCardInstalment.vue';
import { useMedia } from '@/composables/useMedia';
import ArrowCard from "@/components/cards/ArrowCard.vue";
import SocialLinks from '@/components/socialLinks/SocialLinks.vue';
import SocialLinksItem from '@/components/socialLinks/SocialLinksItem.vue';

type ProductCardChipsProps = InstanceType<typeof ProductCardChips>["$props"]['chips'];
type ProductCardInfoProps = InstanceType<typeof ProductCardInfo>["$props"];
type ProductCardPaymentProps = InstanceType<typeof ProductCardPayment>["$props"];
type ProductCardInstalmentProps = InstanceType<typeof ProductCardInstalment>["$props"];
type ArrowCardProps = InstanceType<typeof ArrowCard>["$props"];


interface Props {
  images: string[];
  chips: ProductCardChipsProps;
  info: ProductCardInfoProps;
  payment: ProductCardPaymentProps;
  instalment: ProductCardInstalmentProps;
  advantages: ArrowCardProps[];
}

const props = defineProps<Props>();

const { isDesktopScreen } = useMedia();
</script>

<style scoped>
.product-card {
  margin-bottom: 30px;
  display: flex;
  flex-direction: column;
}

.product-card__carousel {
  margin-bottom: 30px;
}

.product-card__main {
  margin-bottom: 30px;
}

.product-card__payments {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-bottom: 30px;
}

.product-card__advantages {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

@media (min-width: 768px) {
  .product-card {
    margin-bottom: 16px;
  }

  .product-card__payments {
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-bottom: 30px;
  }

  .product-card__advantages {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
}

@media (min-width: 1024px) {
  .product-card__carousel {
    overflow: hidden;
    margin-bottom: 0;
  }

  .product-card__main-top {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

  .product-card__payments {
    gap: 30px;
    margin-bottom: 80px;
  }

  .product-card__advantages {
    gap: 30px;
  }
}

@media (min-width: 1440px) {
  .product-card {
    margin-bottom: 60px;
  }

  .product-card {
    display: flex;
    gap: 20px;
  }

  .product-card__wrapper {
    display: flex;
    gap: 30px;
  }

  .product-card__main {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    margin-bottom: 0;
  }

  .product-card__main-top {
    grid-template-columns: 1fr 379px;
  }

  .product-card__advantages {
    grid-area: span 2;
  }

  .product-card__payments {
    width: 288px;
    gap: 16px;
    margin-bottom: 0;
    display: flex;
  }

  .product-card__advantages {
    margin-top: auto;
  }

  .product-card__social {
    align-self: flex-end;
  }
}
</style>