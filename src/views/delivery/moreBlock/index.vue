  <template>
    <div class="moreBlock-container">
      <div class="cards-container">
        <GrayInfoBlock v-for="(card, index) in visibleCards" :title="card.title" :subtitle="card.subtitle && card.subtitle" :key="index" >
          <div class="slot" v-html="card.slot" />
        </GrayInfoBlock>
      </div>
      <RoundButton
          v-if="hasMoreCards"
          @click="loadMore"
          text="Показать еще"
          class="button"
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

  <style scoped>

  .moreBlock-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .moreBlock-container > div > button {
    width: 100%;
  }

  .cards-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 30px;
  }

  .cards-container > div {
    flex-grow: 1;
    flex-basis: 380px;
  }

  .button {
    display: flex;
    flex-direction: column;
    align-items: stretch;
  }

  </style>