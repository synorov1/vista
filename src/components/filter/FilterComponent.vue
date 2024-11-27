<template>
  <div class="filter-component">
    <SquareButton class="filter-btn" text="Текст" @click="openModal" />
    <div class="filters">
      <div class="filter-section">
        <h5>Цена</h5>
        <div class="price-search">
          <RangeSlider :min="0" :max="10000" v-model:minValue="filters.price.min" v-model:maxValue="filters.price.max" />
        </div>
      </div>
      <div class="filter-section">
        <h5>Бренд</h5>
        <div class="brand-filter">
          <div class="indent" v-for="brand in filters.brands" :key="brand.name">
            <label class="checkbox-label">
              <input type="checkbox" class="checkbox-input" />
              <span class="brand">{{ brand.name }} ({{ brand.count }})</span>
            </label>
          </div>
        </div>
      </div>
      <div class="filter-section">
        <h5>Тип накладки</h5>
        <div class="type-filter">
          <div class="indent" v-for="type in filters.types" :key="type.name">
            <label class="checkbox-label">
              <input type="checkbox" class="checkbox-input" />
              <span class="type">{{ type.name }} ({{ type.count }})</span>
            </label>
          </div>
        </div>
      </div>
      <XSBlueButton class="filter-btnSearch" text="Купить" height="45px" />
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="filterModalLabel">Цена</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="filter-section">
              <div class="price-search">
                <RangeSlider :min="0" :max="10000" v-model:minValue="filters.price.min" v-model:maxValue="filters.price.max" />
              </div>
            </div>
            <div class="filter-section">
              <h5>Бренд</h5>
              <div class="brand-filter">
                <div class="indent" v-for="brand in filters.brands" :key="brand.name">
                  <label class="checkbox-label">
                    <input type="checkbox" class="checkbox-input" />
                    <span class="brand">{{ brand.name }} ({{ brand.count }})</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="filter-section">
              <h5>Тип накладки</h5>
              <div class="type-filter">
                <div class="indent" v-for="type in filters.types" :key="type.name">
                  <label class="checkbox-label">
                    <input type="checkbox" class="checkbox-input" />
                    <span class="type">{{ type.name }} ({{ type.count }})</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <XSBlueButton class="filter-btnSearch" text="Купить" height="45px" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';
import SquareButton from '~/components/common/buttons/SquareButton.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import RangeSlider from '~/components/filter/RangeSlider.vue';
import { Modal } from 'bootstrap';

const filters = ref({
  price: {
    min: 50,
    max: 1000000
  },
  brands: [
    { name: 'Andro', count: 30 },
    { name: 'Butterfly', count: 38 },
    { name: 'DHS', count: 44 },
    { name: 'Donic', count: 44 },
    { name: 'Dr. Neubauer', count: 23 },
    { name: 'Gewo', count: 25 }
  ],
  types: [
    { name: 'Гладкая', count: 155 },
    { name: 'Короткие шипы', count: 15 },
    { name: 'Средние шипы', count: 7 },
    { name: 'Длинные шипы', count: 24 },
    { name: 'Антиспин', count: 3 },
    { name: 'Губка для накладки', count: 0 }
  ]
});

watch(() => filters.value.price.min, (newVal) => {
  if (newVal > filters.value.price.max) {
    filters.value.price.max = newVal;
  }
});

watch(() => filters.value.price.max, (newVal) => {
  if (newVal < filters.value.price.min) {
    filters.value.price.min = newVal;
  }
});

const openModal = () => {
  const modalElement = document.getElementById('filterModal');
  if (modalElement) {
    const modal = new Modal(modalElement);
    modal.show();
  }
};
</script>

<style scoped>
.filter-component {
  width: 100%;
}

.filter-btn {
  width: 100%;
  display: block;
}

.filters {
  display: none;
}

h5 {
  font-weight: 700;
}

.filter-section {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.price-search, .brand-filter, .type-filter {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.brand-filter, .type-filter {
  gap: 0;
}

.indent {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 14px 0;
  gap: 10px;
  width: 224px;
  height: 45px;
  box-sizing: border-box;
}

.price-input {
  width: 100%;
  padding: 14px;
  background-color: transparent;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
}

.range-slider {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 10px;
  position: relative;
}

.range-input {
  width: 100%;
  appearance: none;
  background-color: transparent;
  cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  height: 4px;
  border-radius: 2px;
  z-index: 1;
}

.range-input::-webkit-slider-thumb {
  appearance: none;
  width: 20px;
  height: 20px;
  background-color: var(--blue-400-color);
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  top: -8px;
  z-index: 2;
}

.range-input::-moz-range-thumb {
  width: 20px;
  height: 20px;
  background-color: var(--blue-400-color);
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  top: -8px;
  z-index: 2;
}

.range-input::-ms-thumb {
  width: 20px;
  height: 20px;
  background-color: var(--blue-400-color);
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  top: -8px;
  z-index: 2;
}

.range-input::-webkit-slider-runnable-track {
  width: 100%;
  height: 4px;
  background-color: var(--gray-300-color);
  border-radius: 2px;
}

.range-input::-moz-range-track {
  width: 100%;
  height: 4px;
  background-color: var(--gray-300-color);
  border-radius: 2px;
}

.range-input::-ms-track {
  width: 100%;
  height: 4px;
  background-color: var(--gray-300-color);
  border-radius: 2px;
}

.price, .brand, .type {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
}

.btn-primary {
  background-color: var(--blue-400-color);
  border-radius: 6px;
}

.checkbox-label {
  display: flex;
  align-items: center;
  gap: 10px;
}

.checkbox-input {
  appearance: none;
  width: 20px;
  height: 20px;
  border: 1px solid var(--gray-600-color);
  border-radius: 50%;
  background-color: transparent;
  cursor: pointer;
}

.checkbox-input:checked {
  background-color: var(--blue-400-color);
  border-color: var(--blue-400-color);
}

/* Стили для модального окна */
.modal-content {
  width: 288px;
  border: 1px solid var(--gray-400-color);
  border-radius: 20px;
  padding: 0;
}

.modal-header {
  padding: 16px;
  border-bottom: none;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal-body {
  padding: 16px;
}

.modal-footer {
  padding: 16px;
  border-top: none;
}

.modal-title {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.filter-section h5 {
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.price-inputs .indent {
  padding: 10px 14px 10px 0;
  gap: 10px;
}

.range-slider {
  margin-top: 10px;
}

.brand-filter, .type-filter {
  gap: 10px;
}

.brand-filter .indent, .type-filter .indent {
  padding: 10px 14px 10px 0;
  gap: 10px;
}

.checkbox-input {
  border: 1px solid var(--gray-600-color);
  border-radius: 100px;
}

.checkbox-input:checked {
  background-color: var(--blue-400-color);
  border-color: var(--blue-400-color);
}

.filter-btnSearch {
  width: 100%;
  height: 45px;
  background-color: var(--blue-400-color);
  border-radius: 6px;
  color: var(--white-color);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
}

/* Стили для экранов от 320px */
@media (min-width: 320px) {
  .filters {
    display: none;
  }

  .filter-btn {
    display: block;
  }

  .modal-content {
    width: 288px;
    border: 1px solid var(--gray-400-color);
    border-radius: 20px;
    padding: 0;
  }

  .modal-header {
    padding: 16px;
    border-bottom: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .modal-body {
    padding: 16px;
  }

  .modal-footer {
    padding: 16px;
    border-top: none;
  }

  .modal-title {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;
    letter-spacing: -0.02em;
    color: var(--black-color);
  }

  .filter-section h5 {
    font-size: 20px;
    line-height: 24px;
    letter-spacing: -0.02em;
    color: var(--black-color);
  }

  .price-inputs .indent {
    padding: 10px 14px 10px 0;
    gap: 10px;
  }

  .range-slider {
    margin-top: 10px;
  }

  .brand-filter, .type-filter {
    gap: 10px;
  }

  .brand-filter .indent, .type-filter .indent {
    padding: 10px 14px 10px 0;
    gap: 10px;
  }

  .checkbox-input {
    border: 1px solid var(--gray-600-color);
    border-radius: 100px;
  }

  .checkbox-input:checked {
    background-color: var(--blue-400-color);
    border-color: var(--blue-400-color);
  }

  .filter-btnSearch {
    width: 100%;
    height: 45px;
    background-color: var(--blue-400-color);
    border-radius: 6px;
    color: var(--white-color);
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 17px;
  }
}

/* Стили для экранов от 768px */
@media (min-width: 768px) {
  .filters {
    display: none;
  }

  .filter-btn {
    display: block;
  }

  .modal-content {
    width: 320px;
    border: 1px solid var(--gray-400-color);
    border-radius: 20px;
    padding: 0;
  }

  .modal-header {
    padding: 16px;
    border-bottom: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .modal-body {
    padding: 16px;
  }

  .modal-footer {
    padding: 16px;
    border-top: none;
  }

  .modal-title {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;
    letter-spacing: -0.02em;
    color: var(--black-color);
  }

  .filter-section h5 {
    font-size: 20px;
    line-height: 24px;
    letter-spacing: -0.02em;
    color: var(--black-color);
  }

  .price-inputs .indent {
    padding: 10px 14px 10px 0;
    gap: 10px;
  }

  .range-slider {
    margin-top: 10px;
  }

  .brand-filter, .type-filter {
    gap: 10px;
  }

  .brand-filter .indent, .type-filter .indent {
    padding: 10px 14px 10px 0;
    gap: 10px;
  }

  .checkbox-input {
    border: 1px solid var(--gray-600-color);
    border-radius: 100px;
  }

  .checkbox-input:checked {
    background-color: var(--blue-400-color);
    border-color: var(--blue-400-color);
  }

  .filter-btnSearch {
    width: 100%;
    height: 45px;
    background-color: var(--blue-400-color);
    border-radius: 6px;
    color: var(--white-color);
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 17px;
  }
}

/* Стили для экранов от 1024px */
@media (min-width: 1024px) {
  .filters {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 284px;
    border: 1px solid var(--gray-400-color);
    border-radius: 20px;
    padding: 20px;
    box-sizing: border-box;
  }

  .filter-btn {
    display: none;
  }

  .filter-btnSearch {
    width: 100%;
    height: 45px;
  }

  .price-inputs {
    gap: 10px;
    display: flex;
    flex-direction: column;
  }
}

/* Стили для экранов от 1440px */
@media (min-width: 1440px) {
  .price-search {
    display: flex;
    flex-direction: column;
  }

  .price-inputs {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row;
  }

  .range-slider {
    margin-top: 10px;
  }
}
</style>
