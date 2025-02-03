<template>
  <div class="card-container">
    <div class="buttons">
      <slot name="buttons"></slot>
    </div>
    <div class="filters-and-cards">
      <div class="filters">
        <div class="radio-buttons-mobile">
          <slot name="radio-buttons"></slot>
        </div>
        <slot name="filters"></slot>
      </div>
      <div class="radio-buttons-and-cards">
        <div class="radio-buttons-desktop">
          <slot name="radio-buttons"></slot>
        </div>
        <div class="card-grid">
          <slot name="cards"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.card-container {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.filters-and-cards {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.filters {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 100%;
}

.card-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(139px, 1fr));
  gap: 10px;
  grid-auto-rows: auto;
}

.buttons {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 20px;
}

.radio-buttons-mobile {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 20px;
  width: 100%;
}

.radio-buttons-desktop {
  display: none;
}

.radio-buttons-and-cards {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

@media (min-width: 768px) {
  .card-grid {
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }
  .filters-and-cards {
    align-items: flex-start;
  }
  .radio-buttons-mobile {
    width: 100%;
    align-self: flex-start;
  }
}

@media (min-width: 1024px) {
  .card-container {
    flex-direction: column;
  }
  .filters-and-cards {
    display: flex;
    flex-direction: row;
    gap: 20px;
  }
  .filters {
    width: 284px;
  }
  .card-grid {
    flex-grow: 1;
    grid-template-columns: repeat(3, 1fr);
  }
  .buttons {
    width: 100%;
    justify-content: center;
    margin-bottom: 20px;
  }
  .radio-buttons-and-cards {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex-grow: 1;
  }
  .radio-buttons-desktop {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
    align-self: flex-start;
  }
  .radio-buttons-mobile {
    display: none;
  }
}

@media (min-width: 1440px) {
  .card-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

.card-grid > * {
  align-self: start;
}
</style>
