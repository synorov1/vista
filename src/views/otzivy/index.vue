<template>
  <section class="page-container">
    <ReviewsBanner
      title="Отзывы"
      subtitle="Мы рады получать отзывы от наших клиентов. Ваши мнения помогают нам становиться лучше и совершенствовать нашу работу."
    />

    <div class="page-container">
      <div class="header">
        <div class="reviews__rating">
          <ReviewsAllRating/>
        </div>
        <h1>Отзывы клиентов</h1>
        <button class="review__write" type="button">Написать отзыв</button>
      </div>

      <Reviews :reviews="allReviews" :has-arrows="isTabletScreen">
        <template #head>
          <ReviewsPlatformSwitcher @change="handlePlatformChange"/>
        </template>
      </Reviews>
    </div>
  </section>
</template>

<script lang="ts" setup>
import ReviewsPlatformSwitcher from "@/components/reviews/ReviewsPlatformSwitcher.vue";
import { ref } from 'vue';

// @ts-ignore
import { useMedia } from '@/composables/useMedia';
import ReviewsAllRating from "@/components/reviews/ReviewsAllRating.vue";
import ReviewsBanner from "@/components/reviews/ReviewsBanner.vue";
import Reviews from "@/components/reviews/Reviews.vue";

const { isTabletScreen } = useMedia({
  tablet: {
    min: 1004,
    max: Infinity
  }
});

const allReviews = [
    {
      "image": "",
      "name": "Александр Е.",
      "date": "16 марта 2024",
      "rating": "4.8",
      "text": "Без преувеличения лучший магазин в России. Огромный ассортимент в наличии! И пусть санкции отдохнут. Без преувеличения лучший магазин в России. Огромный ассортимент в наличии! И пусть санкции отдохнут",
    },
    {
      "image": "",
      "name": "Ивано А.",
      "date": "16 марта 2024",
      "rating": "5",
      "text": "Без преувеличения лучший магазин в России. Огромный ассортимент в наличии! И пусть санкции отдохнут. Без преувеличения лучший магазин в России. Огромный ассортимент в наличии! И пусть санкции отдохнут",
    },
    {
      "image": "",
      "name": "Petrov M.",
      "date": "16 марта 2024",
      "rating": "1",
      "text": "Без преувеличения лучший магазин в России. Огромный ассортимент в наличии! И пусть санкции отдохнут. Без преувеличения лучший магазин в России. Огромный ассортимент в наличии! И пусть санкции отдохнут",
    }
];

const activePlatform = ref('all');

function handlePlatformChange(platform: string) {
  activePlatform.value = platform;
  console.log(activePlatform.value);
  console.log(isTabletScreen);

}

</script>

<style scoped>
.page-container {
  max-width: 1200px;
  margin: 0 auto;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 26px;
  margin-top: 82px;
  gap: 10px;
}

.header h1 {
  margin: 0;
}

.reviews__rating {
  display: none;
  @media (max-width: 767px) {
    display: flex;
  }
}

.review__write {
  background-color: #0084ff;
  color: #ffffff;
  padding: 10px 20px;
  border-radius: 6px;
  max-width: 300px;
  width: 100%;
  border: unset;
}
.content {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.card {
  border: 1px solid #d9d9d9;
  border-radius: 16px;
  padding: 20px;
}
.card-header {
  display: flex;
  align-items: center;
  gap: 10px;
}
.photo {
  width: 50px;
  height: 50px;
  background-color: #f5f6fa;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: bold;
}
.name {
  font-weight: bold;
}
.date {
  color: #a0a0a0;
}
.card-body {
  margin-top: 10px;
}
.show-more {
  background-color: #f0f0f0;
  color: #000000;
  padding: 5px 10px;
  border-radius: 6px;
}
@media (max-width: 767px) {
  .header {
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 20px;
    margin-top: 40px;
  }
  .review__write {
    display: none;
  }
}
</style>
