<template>
    <a v-if="href" href="href" :class="['link', color]">{{ text }}</a>
    <button v-else :class="['button', color]" @click="$emit('click')">{{ text }}</button>
</template>

<script setup lang="ts">
import type { PropType } from 'vue';

defineProps({
    text: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        default: '',
    },
    color: {
        type: String as PropType<'blue'>,
        default: 'blue',
    }
})
defineEmits(['click']);
</script>

<style scoped>
.link, .button {
    font-family: Inter;
    font-size: 14px;
    font-weight: 600;
    line-height: 16.94px;
    text-align: left;
    text-decoration-line: underline;
    text-decoration-style: solid;
    text-underline-position: from-font;
    text-decoration-skip-ink: none;
}
.button {
    background: transparent;
    outline: none;
    border: none;
    margin: 0;
    padding: 0;
}
.button:hover, .link:hover {
    opacity: 0.8;
}
.link.blue {
    color: var(--blue-400-color);
}
.button.blue {
    color: var(--blue-400-color);

}
</style>