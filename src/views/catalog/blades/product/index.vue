<template>
  <div class="product">
    <ProductCard
      :images="data.card.images"
      :chips="data.card.chips"
      :info="data.card.info"
      :payment="data.card.payment"
      :instalment="data.card.instalment"
      :advantages="data.card.advantages"
    />

    <ProductRatings
      :product-rating="data.ratings.productRating"
      :customer-evaluation="data.ratings.customerEvaluation"
    />

    <ProductReviews :reviews="data.reviews" />
  
    <ProductInfo 
      :text="data.info.text" 
      :list="data.info.items"
      :price="data.viewed[0].price"
    />

    <ProductViewed :products="data.viewed" />
  </div>
</template>

<script lang="ts" setup>
import ProductRatings from '@/components/product/ProductRatings.vue';
import ProductCard from '@/components/product/card/ProductCard.vue';
import ProductInfo from '@/components/product/ProductInfo.vue';
import ProductViewed from '@/components/product/ProductViewed.vue';
import ProductReviews from '@/components/product/ProductReviews.vue';
import data from '@/views/catalog/blades/product/product.json';
</script>