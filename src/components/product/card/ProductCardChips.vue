<template>
  <div v-drag-scroller.onlyX class="product-card-chips hide-scrollbar">
    <RoundButton
      v-for="item in props.chips"
      :key="item.text"
      :text="item.text"
      class="product-card-chips__button"
    />
  </div>
</template>

<script lang="ts" setup>
import RoundButton from "@/components/common/Buttons/RoundButton.vue";

interface Chips {
  text: string;
}

interface Props {
  chips: Chips[]
}

const props = defineProps<Props>();
</script>

<style scoped>
.product-card-chips {
  display: flex;
  align-items: center;
  overflow-x: auto;
  gap: 10px;
  margin-left: -.75rem;
  margin-right: -.75rem;
  padding-left: .75rem;
  padding-right: .75rem;
}

:deep(.round-btn) {
  width: auto;
}


@media (min-width: 767px) {
  .product-card-chips {
    margin-left: 0;
    margin-right: 0;
    padding-left: 0;
    padding-right: 0;
  }
}
</style>