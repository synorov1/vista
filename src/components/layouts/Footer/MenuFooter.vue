<template>
  <div class="menu-footer">
    <div class="menu-title">Меню</div>
    <div v-if="!isColumnMenuVisible" class="accordion" id="accordionMenu">
      <div v-for="(item, index) in menuData" :key="index" class="accordion-item">
        <h2 class="accordion-header" :id="'heading' + index">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse' + index" aria-expanded="false" :aria-controls="'collapse' + index">
            <a :href="item.link">{{ item.text }}</a>
          </button>
        </h2>
        <div :id="'collapse' + index" class="accordion-collapse collapse" :aria-labelledby="'heading' + index" data-bs-parent="#accordionMenu">
          <div class="accordion-body">
            <a v-for="(subItem, subIndex) in item.subMenu" :key="subIndex" class="sub-menu-item" :href="subItem.link">
              {{ subItem.text }}
            </a>
          </div>
        </div>
      </div>
    </div>
    <ColumnMenu v-if="isColumnMenuVisible" :menuData="menuData" />
    <div class="copyright">
      © 2024 При полной или частичной перепечатке материалов ссылка на сайт <a class="copyright-link" href="Vistasport.ru">Vistasport.ru</a> обязательна
    </div>
    <div class="company-info">
      ИП Макарова Елена Валерьевна, Российская Федерация, 125009, Москва, ул. Тверская д.6 стр.1 кв.118, ИНН: 772383358363, ОГРН: 319774600264321, Банк: АО "Тинькофф Банк", БИК: 044525974, Р/с: 40802810500001669341, Кор/сч: 30101810145250000974
    </div>
  </div>
</template>

<script setup lang="ts">
import ColumnMenu from './ColumnMenu.vue';
import { computed } from 'vue';
import data from './Menu.mock.json';
export interface SubMenuItem {
    link: string;
    text: string;
}

export interface MenuItem {
    link: string;
    text: string;
    subMenu: SubMenuItem[];
}

const menuData = data as MenuItem[];
const isColumnMenuVisible = computed(() => {
  return window.innerWidth >= 1024;
})
</script>

<style scoped>
.menu-footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  margin-top: 37px;
}

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
  width: 100%;
}

.accordion-item {
  border: none;
  box-shadow: none;
}

.accordion-header {
  background-color: transparent;
}
.accordion-item:not(:last-of-type) .accordion-header {
  border-bottom: 1px solid var(--gray-400-color);
}

.accordion-button {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  background-color: transparent;
  border: none;
  padding: 14px 0;
  text-align: left;
  position: relative;
  outline: none;
  display: flex;
  align-items: center;
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
  display: inline-block;
  width: 24px;
  height: 24px;
  background-image: url('@/assets/icons/arrow.svg');
  background-size: 24px 24px;
  background-repeat: no-repeat;
  background-position: right center;
  margin-left: auto;
  transition: transform 0.3s;
  opacity: 0.2;
}

.accordion-button:not(.collapsed)::after {
  transform: none;
}

.accordion-button[aria-expanded="true"]::after {
  transform: rotate(90deg);
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
  transition: background-color 0.3 ease;
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
