<template>
    <div class="main-card">
        <div class="title">Не нашли нужную категорию?</div>
        <div class="description">Если вы не нашли нужную категорию, не беспокойтесь! Просто оставьте свои контактные данные, и мы свяжемся с вами в ближайшее время.</div>
        <SquareButton text="Оставить заявку менеджеру" class="button" />
    </div>
</template>

<script setup lang="ts">
import SquareButton from '~/components/common/buttons/SquareButton.vue';
</script>

<style scoped>
.main-card {
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    padding: 16px;
    color: white;
    background-image: url('/images/categories/category.webp');
    background-size: cover;
}
.title {
    font-size: 30px;
    font-weight: 800;
    line-height: 36.31px;
    letter-spacing: -0.02em;
    margin-bottom: 10px;
}
.description {
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
}
.button {
    margin-top: auto;
    background: white;
    width: 100%;
    border-radius: 10px;
}
</style>