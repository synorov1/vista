<template>
  <section class="page-container">
    <GradientBanner
      title="Отзывы"
      subtitle="Мы рады получать отзывы от наших клиентов. Ваши мнения помогают нам становиться лучше и совершенствовать нашу работу."
    />

    <div class="page-container">
      <div class="header">
        <h1>Отзывы клиентов</h1>
        <button class="btn">Написать отзыв</button>
      </div>
      <ResponsiveButtons />
      <div class="content">

        <div class="card">
          <div class="card-header">
            <div class="photo">А</div>
            <div class="name">Александр Е.</div>
            <div class="date">16 марта 2024</div>
          </div>
          <div class="card-body">
            <p>Без преувеличения лучший магазин в России...</p>
            <button class="show-more">Показать полностью</button>
          </div>
        </div>

</div>
    </div>
  </section>
</template>

<script lang="ts" setup>
import GradientBanner from '@/components/common/GradientBanner.vue';
import ResponsiveButtons from '@/components/ResponsiveButtons.vue';
import TitleWithButton from "@/components/common/TitleWithButton.vue";
</script>

<style scoped>
.page-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
.btn {
  background-color: #0084FF;
  color: #FFFFFF;
  padding: 10px 20px;
  border-radius: 6px;
}
.content {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.card {
  border: 1px solid #D9D9D9;
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
  background-color: #F5F6FA;
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
  color: #A0A0A0;
}
.card-body {
  margin-top: 10px;
}
.show-more {
  background-color: #F0F0F0;
  color: #000000;
  padding: 5px 10px;
  border-radius: 6px;
}
@media (max-width: 768px) {
  .header {
    flex-direction: column;
    align-items: flex-start;
  }
  .btn {
    margin-top: 10px;
  }
}
</style> 
