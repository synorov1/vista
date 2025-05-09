<template>
  <div class="product-reviews">
    <div class="product-reviews__card">
      <ReviewsCard
        :image="data.image"
        :name="data.name"
        :available="data.available"
        :rating="data.rating"
        :number-ratings="data.numberRatings"
        :price="data.price"
        :old-price="data.oldPrice"
        :liked="data.liked"
      />
    </div>


    <h2 class="product-reviews__title">
      Все отзывы о товаре
    </h2>
  
    <div class="product-reviews__content">
      <div class="product-reviews__navigation">
        <Tabs
          v-model="currentTab"
          :list="listTabs"
          class="product-reviews__tabs"
        />

        <Select
          v-model="currentTab"
          class="product-reviews__select"
          :options="listTabs"
        />


        <XSBlueButton
          class="product-reviews__navigation-button"
          text="Оставить отзыв"
          height="45px"
        />
      </div>


      <div class="product-reviews__reviews">
        <ReviewsItem
          v-for="(review, index) in data.reviews"
          :key="index"
          v-bind="review"
          :has-button="false"
        />
      </div>

      <SquareButton
        class="product-reviews__button-more"
        text="Загрузить ещё"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
import Tabs from '@/components/Tabs.vue';
import Select from "@/components/Select.vue";
import { ref } from 'vue';
import ReviewsItem from '@/components/reviews/ReviewsItem.vue';
import ReviewsCard from '@/components/reviews/ReviewsCard.vue';
import data from '@/views/catalog/blades/product/reviews/reviews.json';
import XSBlueButton from '@/components/common/Buttons/XSBlueButton.vue';
import SquareButton from '@/components/common/Buttons/SquareButton.vue';

enum FilterTab {
  New,
  Popular, 
}

const currentTab = ref(FilterTab.New);

const listTabs = [
  {
    id: FilterTab.New,
    title: 'Новые',
  },
  {
    id: FilterTab.Popular,
    title: 'Популярные',
  }
];
</script>

<style scoped>
.product-reviews {
  margin-bottom: 40px;
}

.product-reviews__card {
  display: none;
}

.product-reviews__title {
  font-weight: 800;
  font-size: 24px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 20px;
}

.product-reviews__tabs {
  display: none;
}

.product-reviews__navigation {
  margin-bottom: 20px;
  display: flex;
}

.product-reviews__reviews {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.product-reviews__navigation-button {
  display: none;
}

.product-reviews__button-more {
  margin-top: 16px;
  width: 100%;
}

@media (min-width: 768px) {
  .product-reviews {
    margin-bottom: 60px;
  }

  .product-reviews__card {
    display: flex;
    margin-bottom: 30px;
  }

  .product-reviews__title {
    margin-bottom: 30px;
    font-size: 30px;
  }

  .product-reviews__select {
    display: none;
  }

  .product-reviews__button-more {
    margin-top: 30px;
  }

  .product-reviews__tabs {
    display: flex;
  }
}

@media (min-width: 1024px) {
  .product-reviews {
    margin-bottom: 80px;
  }

  .product-reviews__title {
    font-size: 34px;
  }

  .product-reviews__reviews {
    gap: 20px;
  }

  .product-reviews__navigation {
    justify-content: space-between;
  }

  .product-reviews__navigation-button {
    display: flex;
  }
}

@media (min-width: 1440px) {
  .product-reviews__content {
    width: 879px;
  }
}
</style>