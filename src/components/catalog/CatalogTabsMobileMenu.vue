<script setup lang="ts">
import catalogItems from "./catalogItems.json";
</script>

<template>
  <div class="catalog-tabs-mobile-menu">
    <div class="menu-title">Каталог</div>
    <div class="accordion" id="accordionMenu">
      <div
          v-for="(item, index) in catalogItems"
          :key="index"
          :class="[
          'accordion-item',
          {'is-not-expand': !item.childItems.length}
      ]">
        <h2 class="accordion-header" :id="'heading' + index">
          <a
            :href="item.link"
            class="accordion-button"
            type="button"
            :data-bs-toggle="!!item.childItems.length && 'collapse'"
            :data-bs-target="!!item.childItems.length && '#collapse' + index"
            aria-expanded="false" :aria-controls="'collapse' + index"
          >
            {{ item.title }}
          </a>
        </h2>
        <div :id="'collapse' + index"
             class="accordion-collapse collapse"
             :aria-labelledby="'heading' + index"
             data-bs-parent="#accordionMenu">
          <div class="accordion-body">
            <a
                v-for="(subItem, subIndex) in item.childItems"
                :key="subIndex"
                class="sub-menu-item"
                :href="subItem.link">
              {{ subItem.title }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.menu-title {
  width: 70px;
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  color: var(--black-color);
  margin-bottom: 10px;
  align-self: flex-start;
}

.accordion {
  width: 290px;
  padding: 10px;
  border-radius: 20px;

  @media (max-width: 768px) {
    width: 100%;
  }
}

.accordion-item {
  border: none;
  box-shadow: none;
}

.accordion-header {
  background-color: transparent;
}

.accordion-button {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  background-color: transparent;
  border: none;
  padding: 14px;
  text-align: left;
  position: relative;
  outline: none;
  display: flex;
  align-items: center;
  border-radius: 6px;
}
.accordion-button:not(.collapsed) {
  box-shadow: none;
}

.accordion-button:focus {
  outline: none;
  box-shadow: none;
}

.accordion-button::after {
  content: '';
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 14px;
  width: 7px;
  padding: 10px;
  background: url("/src/assets/icons/gray-arrow-right.svg") no-repeat center center;
}

.is-not-expand::after {
  transform: rotate(0deg) !important;
}

.accordion-button[aria-expanded="true"]::after {
  transform: rotate(90deg) translateX(-50%);
}

.accordion-button[aria-expanded="true"] {
  background: var(--gray-50-color);
}

.accordion-button a {
  text-decoration: none;
  color: var(--black-color);
}

.accordion-collapse {
  border: none;
}

.accordion-body {
  padding: 10px;
  display: flex;
  flex-direction: column;
}

.sub-menu-item {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  padding: 14px;
  text-decoration: none;
  color: var(--gray-600-color);
  transition: background-color 0.3s ease;
  background-color: var(--white-color);
}
.sub-menu-item:hover {
  background-color: var(--gray-50-color);
  border-radius: 6px;
}

.copyright {
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  color: var(--gray-600-color);
  margin-bottom: 18px;
  align-self: flex-start;
  border-top: 2px solid var(--gray-400-color);
  padding-top: 16px;
  margin-top: 40px;
  width: 100%;
}

.copyright-link {
  color: var(--black-color);
}

.company-info {
  font-weight: 600;
  font-size: 12px;
  line-height: 16px;
  color: var(--gray-600-color);
  margin-bottom: 45px;
}

@media (min-width: 768px) {
  .menu-title, .accordion {
    display: block;
  }

  .company-info {
    font-size: 14px;
    line-height: 30px;
  }

  .copyright {
    font-size: 14px;
    line-height: 17px;
  }

  .menu-footer {
    position: relative;
  }
}

@media (min-width: 1024px) {
  .menu-title, .accordion {
    display: none;
  }

  .menu-footer {
    position: relative;
  }
}
</style>