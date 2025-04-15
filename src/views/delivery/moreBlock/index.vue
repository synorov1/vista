<template>
  <div :class="$style.container">
    <div :class="$style.cards">
      <GrayInfoBlock
        v-for="(card, index) in visibleCards"
        :key="index"
        :title="card.title"
        :subtitle="card.subtitle && card.subtitle"
      >
        <div :class="$style.slot" v-html="card.slot" />
      </GrayInfoBlock>
    </div>
    <RoundButton
      v-if="hasMoreCards"
      text="Показать еще"
      :class="$style.button"
      @click="loadMore"
    />
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";
import RoundButton from "@/components/common/Buttons/RoundButton.vue";
import GrayInfoBlock from "@/components/common/GrayInfoBlock.vue";

interface Card {
  title: string;
  subtitle?: string;
  slot: string;
}

interface Props {
  initialCount: number;
  incrementCount: number;
  cards: Card[];
}

const props = defineProps<Props>()

const visibleCount = ref(props.initialCount);

const visibleCards = computed(() => props.cards.slice(0, visibleCount.value));
const hasMoreCards = computed(() => visibleCount.value < props.cards.length);
const loadMore = () => {
  visibleCount.value += props.incrementCount;
};

</script>

<style module>
.container {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.container > div > button {
  width: 100%;
}

.cards {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 30px;
}

.cards > div {
  flex-grow: 1;
  flex-basis: 380px;
}

.button {
  display: flex;
  flex-direction: column;
  align-items: stretch;
}
</style>