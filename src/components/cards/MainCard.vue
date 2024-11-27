<template>
    <a class="main-card" :href="content.href">
        <div class="image">
            <img :src="`/images${content.image.src}`" :srcset="`/images${content.image.src2} 2x`" :alt="content.title">
        </div>
        <div class="header">
            <div class="title">{{ content.title }}</div>
            <div class="count">{{ content.count }} товара</div>
        </div>
        <div class="description" v-html="content.desc"></div>
        <div class="button">

        </div>
    </a>
</template>

<script setup lang="ts">
import type { PropType } from 'vue';

interface Content {
    image: {
        src: string,
        src2: string,
    }
    title: string;
    count: string;
    desc: string;
    href: string;
    button: {
        text: string,
        action: string,
    }
}
defineProps({
    content: {
        type: Object as PropType<Content>,
        required: true,
    }
})
</script>

<style scoped>
.main-card {
    border-radius: 20px;
    background-color: var(--gray-200-color);
    display: flex;
    flex-direction: column;
    padding: 16px;
    text-decoration: none;
    color: var(--black-color);
    transition: background-color 0.3s ease;
}
.main-card:hover {
    background-color: var(--blue-100-color);
}
.header {
    margin-bottom: 16px;
}
.image {
    margin-bottom: 16px;
}
.title {
    font-size: 20px;
    font-weight: 800;
    line-height: 24.2px;
    letter-spacing: -0.02em;
}
.cont {
    font-size: 14px;
    line-height: 16.94px;
}
.description {
    font-size: 14px;
    line-height: 24px;
    margin-bottom: 16px;
    color: var(--gray-800-color);
}
.description:deep(a) {
    color: var(--gray-800-color);
}

@media (min-width: 768px) {
    .main-card {
        padding: 30px;
    }
    .header {
        margin-bottom: 20px;
    }
    .image {
        margin-bottom: 20px;
    }
    .title {
        font-size: 24px;
        line-height: 29.05px;
    }
    .description {
        margin-bottom: 20px;
    }
}

@media (min-width: 1024px) {
    .description {
        font-size: 16px;
    }
}
</style>