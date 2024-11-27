<template>
    <div class="section">
        <div class="header">
            <div class="title">Популярные категории</div>
            <RoundButton class="button" text="Задать вопрос" @click="openQA" />
            <Link class="link" text="Задать вопрос" @click="openQA" />
        </div>
        <div class="cards">
            <MainCard v-for="(category, index) in showedCategory" :key="index" :content="category" />
            <StubCard v-if="showStubCard" />
        </div>

        <SquareButton class="show-more-button" v-if="windowWidth < 1024 && !isShowMore" @click="showMore" text="Показать ещё категории" />
    </div>
</template>

<script setup lang="ts">
import data from './categories.json';
import MainCard from '@/components/cards/MainCard.vue';
import Link from '@/components/common/Link.vue';
import StubCard from '@/components/cards/StubCard.vue';
import RoundButton from '@/components/common/Buttons/RoundButton.vue';
import SquareButton from '@/components/common/Buttons/SquareButton.vue';
import { ref, computed, onMounted, onUnmounted } from 'vue';


const categories = data;
const isShowMore = ref(false);
const windowWidth = ref(0);

const showedCategory = computed(() => {
    if (windowWidth.value < 1024 && !isShowMore.value) {
        return categories.slice(0, 4);
    }
    if (windowWidth.value < 768 && !isShowMore.value) {
        return categories.slice(0, 1);
    }
    return categories;
});

const showStubCard = computed(() => {
    if (windowWidth.value > 1023) {
        return true;
    }

    if (windowWidth.value < 768) {
        return false;
    }

    return isShowMore.value;
})

const showMore = () => {
    isShowMore.value = !isShowMore.value;
}

onMounted(() => {
    windowWidth.value = window.innerWidth;
    window.addEventListener('resize', handleResize);
})

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
})

const openQA = () => {
    console.log('open ask question')
}

const handleResize = () => {
    windowWidth.value = window.innerWidth;
}
</script>

<style scoped>
.section {
    margin-bottom: 40px;
}
.cards {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
}
.title {
    font-size: 24px;
    font-weight: 800;
    line-height: 29.05px;
    letter-spacing: -0.02em;
}
.header {
    margin-bottom: 30px;
    width: 100%;
    display: flex;
    flex-direction: column-reverse;
}

.show-more-button {
    margin-top: 20px;
    width: 100%;
}

.button {
    display: none;
}
.link {
    display: block;
    margin-bottom: 10px;
}
@media (min-width: 768px) {
    .button {
        display: block;
    }
    .link {
        display: none;
    }
    .cards {
        grid-template-columns: repeat(2, 1fr);
    }
    .header {
        flex-direction: row;
        justify-content: space-between;
    }
    .title {
        font-size: 30px;
        line-height: 36.31px;
    }
    .show-more-button {
        margin-top: 30px;
    }
    .section {
        margin-bottom: 80px;
    }
}

@media (min-width: 1024px) {
    .cards {
        gap: 30px;
    }
    .title {
        font-size: 34px;
        line-height: 41.15px;
    }
}

@media (min-width: 1440px) {
    .cards {
        grid-template-columns: repeat(3, 1fr);
    }
    .section {
        margin-bottom: 128px;
    }
}
</style>