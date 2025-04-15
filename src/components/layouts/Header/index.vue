<template>
  <div class="header">
    <div class="top-banner">
      <p>Успейте купить набор для настольного тенниса Joola <span @click="openDiscountInfoModal">со скидкой 20%</span> до 18 мая</p>
      <img src="/src/assets/icons/arrow.svg" alt="">
    </div>
    <div class="container">
      <div class="mid">
        <router-link to="/">
          <img
            src="/src/assets/images/main-logo.webp"
            srcset="/src/assets/images/main-logo@2x.webp 2x"
            alt="vistasport"
          >
        </router-link>
        <div class="logo" />
        <button class="ctl-btn header__catalog-btn" @click="showCatalog">
          <img src="/src/assets/icons/icon-catalog.svg" alt="">
          <span>Каталог</span>
        </button>
        <div class="search">
          <input
            type="text"
            placeholder="Поиск по каталогу"
            @focus="toggleSearchDropdown"
          >
          <ul v-if="isSearchDropdownVisible" class="dropdown dropdown-search">
            <li v-for="item in dropdownSearchHistory" :key="item">
              <span>{{ item }}</span>
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M8.24457 18.6926C8.59658 19.0738 9.19898 19.1047 9.59011 18.7616L11.7973 16.8256C12.7328 16.0051 13.5087 15.3245 14.0415 14.7073C14.6017 14.0582 15 13.3609 15 12.5C15 11.6392 14.6017 10.9418 14.0415 10.2928C13.5087 9.67545 12.7328 8.99487 11.7973 8.17438L9.59011 6.23837C9.19898 5.8953 8.59658 5.92625 8.24457 6.30733C7.89255 6.68854 7.92431 7.27565 8.31545 7.61872L10.4705 9.50917C11.4714 10.387 12.1462 10.9818 12.5833 11.4883C13.0029 11.9743 13.0945 12.258 13.0945 12.5C13.0945 12.742 13.0029 13.0257 12.5833 13.5118C12.1462 14.0182 11.4714 14.613 10.4705 15.4909L8.31545 17.3812C7.92431 17.7243 7.89255 18.3114 8.24457 18.6926Z" fill="#D9D9D9" />
              </svg>
            </li>
            <div class="search-items">
              <SearchProductCard />
              <SearchProductCard />
              <SearchProductCard />
              <SearchProductCard />
            </div>
          </ul>
        </div>
        <a class="contact">
          <div class="top">8 (800) 234-24-20</div>
          <div class="bott">Бесплатно по России</div>
        </a>
        <div class="actions">
          <button
            type="button"
            class="auth"
            @click="toggleDropdown"
          >
            <div>
              <img src="@/assets/icons/icon-home.svg">
              <p>Войти</p>
            </div>

            <ul v-if="isDropdownVisible" class="dropdown">
              <div class="profile">
                <div class="avatar">
                  А
                </div>
                <div class="name">
                  <p>Александр Е.</p>
                  <span>16 марта 2024</span>
                </div>
              </div>
              <li v-for="item in dropdownList" :key="item.name">
                <span>{{ item.name }}</span>
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path d="M8.24457 18.6926C8.59658 19.0738 9.19898 19.1047 9.59011 18.7616L11.7973 16.8256C12.7328 16.0051 13.5087 15.3245 14.0415 14.7073C14.6017 14.0582 15 13.3609 15 12.5C15 11.6392 14.6017 10.9418 14.0415 10.2928C13.5087 9.67545 12.7328 8.99487 11.7973 8.17438L9.59011 6.23837C9.19898 5.8953 8.59658 5.92625 8.24457 6.30733C7.89255 6.68854 7.92431 7.27565 8.31545 7.61872L10.4705 9.50917C11.4714 10.387 12.1462 10.9818 12.5833 11.4883C13.0029 11.9743 13.0945 12.258 13.0945 12.5C13.0945 12.742 13.0029 13.0257 12.5833 13.5118C12.1462 14.0182 11.4714 14.613 10.4705 15.4909L8.31545 17.3812C7.92431 17.7243 7.89255 18.3114 8.24457 18.6926Z" fill="#D9D9D9" />
                </svg>
              </li>
            </ul>
          </button>
          <a
            v-for="action in actions"
            :key="action.icon"
            href=""
            @click.prevent="action.onClick ? action.onClick() : null"
          >
            <div>
              <img :src="action.icon">
              <p>{{ action.text }}</p>
            </div>
          </a>
        </div>

        <BurgerMenu
          v-model="isShowCatalog"
          class="header__menu"
          @click="showCatalog"
        />
      </div>
      <div class="search search-mobile">
        <input type="text" placeholder="Поиск по каталогу">
      </div>
      <div class="bot">
        <div class="scroll-content">
          <a
            target="_blank"
            href="https://yandex.com/maps/-/CDekEQZ8"
            class="delivery"
          >
            <img src="/src/assets/icons/icon-map-point.svg">
            <span>Доставка по РФ</span>
          </a>
          <div class="categories">
            <router-link
              v-for="category in categories" 
              :key="category.link"
              :to="category.link"
            >
              {{ category.text }}
            </router-link>
          </div>
          <div class="info">
            <a href="/">Где поиграть</a>
            <a href="/">Оплата долями</a>
          </div>
        </div>
      </div>
    </div>
    <HeaderCatalog
      :class="[
        'header-catalog-menu',
        {'is-open': isShowCatalog},
      ]"
    />
    <AuthModals
      v-model:is-open="isAuthModalOpen"
    />
    <RecoveryModals
      v-model:is-open="isRecoveryModalOpen"
    />
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import { useScrollLock } from '@vueuse/core'
import BurgerMenu from '@/components/BurgerMenu.vue'
import HeaderCatalog from '@/components/catalog/HeaderCatalog.vue'
import AuthModals from '@/components/common/Modal/auth/AuthModals.vue'
import RecoveryModals from '@/components/common/Modal/recovery/RecoveryModals.vue'
import { useDiscountInfoModal } from '@/composables/useModal'
import SearchProductCard from '@/components/SearchProductCard.vue'

const isScrollLock = useScrollLock(document.body)

const isShowCatalog = ref(false)
const isAuthModalOpen = ref(false)
const isRecoveryModalOpen = ref(false)

const { openDiscountInfoModal } = useDiscountInfoModal()

const showCatalog = () => {
  isShowCatalog.value = !isShowCatalog.value
  isScrollLock.value = isShowCatalog.value
}

const isDropdownVisible = ref(false);
const isSearchDropdownVisible = ref(false);

function toggleDropdown() {
  isDropdownVisible.value = !isDropdownVisible.value;
}

function toggleSearchDropdown() {
  isSearchDropdownVisible.value = !isSearchDropdownVisible.value;
}

const dropdownList = [
  {"name": "Личный кабинет", "href": "/"},
  {"name": "Избранное", "href": "/"},
  {"name": "Заказы", "href": "/"},
  {"name": "Мои отзывы", "href": "/"},
  {"name": "История покупок", "href": "/"},
  {"name": "Выйти", "href": "/"},
]

const dropdownSearchHistory = [
  "Запрос 1", "Запрос 2", "Запрос 3", "Запрос 4", "Запрос 5"
]

const actions = computed(() => [
  // {
  //   icon: '/src/assets/icons/icon-home.svg',
  //   href: '/',
  //   text: 'Войти',
  //   onClick: () => isAuthModalOpen.value = true
  // },
  {
    icon: '/src/assets/icons/icon-heart.svg',
    href: '/',
    text: 'Забыли пароль?',
    onClick: () => isRecoveryModalOpen.value = true
  },
  {
    icon: '/src/assets/icons/icon-people.svg',
    href: '/',
    text: 'Избранное'
  },
  {
    icon: '/src/assets/icons/icon-cart.svg',
    href: '/',
    text: 'Корзина'
  }
])

const categories = [
  {
    link: '/brands',
    text: 'Бренды',
  },
  {
    link: '/services',
    text: 'Услуги',
  },
  {
    link: '/delivery',
    text: 'Доставка и оплата',
  },
  {
    link: '/blog',
    text: 'Наш блог',
  },
  {
    link: '/contacts',
    text: 'Контакты',
  },
  {
    link: '/shop',
    text: 'Магазин',
  },
] as const
</script>

<style scoped>
.header {
  margin-bottom: 30px;

  a {
    color: var(--black-color);
    text-decoration: none;
  }
}

.header-catalog-menu {
  display: none;
  position: absolute;
  width: 100%;
  left: 0;
  z-index: 2;
  opacity: 0;
  transition: opacity 0.3s;
  top: 98px;


  @media (min-width: 425px) {
    top: 145px;
  }

  @media (min-width: 320px) {
    top: 115px;
  }
}


.header-catalog-menu.is-open {
  display: block;
  opacity: 1;
  transition: all 0.3s ease;
}

.profile {
  display: flex;
  gap: 10px;
  align-items: center;
  margin-bottom: 20px;
}

.avatar {
  height: 42px;
  width: 42px;
  background: #F5F6FA;
  border-radius: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: Inter;
  font-weight: 600;
  font-size: 24px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #A9B2D6;

}

.name {
  display: flex;
  flex-direction: column;
  gap: 4px;
  text-align: left;
}

.name p {
  font-weight: 700;
  font-size: 14px;
  line-height: 100%;
  letter-spacing: 0;
  color: #000;
}

.name span {
  font-family: Inter;
font-weight: 500;
font-size: 10px;
line-height: 100%;
letter-spacing: 0%;
color: #A0A0A0;

}

.top-banner {
  display: none;
  justify-content: center;
  align-items: center;
  padding: 15px 0;
  gap: 5px;
  font-size: 12px;
  font-weight: 600;
  background-color: #F5F5F5;

  p {
    margin-bottom: 0;
  }

  span {
    color: var(--red-color);
    cursor: pointer;
  }

  @media (min-width: 550px) {
    display: flex;
  }
}
.mid {
  display: flex;
  align-items: center;
  margin: 10px 0 10px 0
}

.header__menu {
  display: none;

  @media (max-width: 991px){
    display: block;
    margin-left: auto;
  }
}

.ctl-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 15px;
  margin: 0 10px 0 35px;
  border: none;
  border-radius: 6px;
  background-color: var(--blue-400-color);
  color: var(--white-color);

  @media (max-width: 1200px){
    margin: 0 15px 0 10px;
  }

  @media (max-width: 991px){
    margin: 0 10px 0 30px;
  }
}

.search {
  width: 100%;
  margin-left: 15px;
  margin-right: 15px;
  display: none;
  position: relative;

  @media (min-width: 1200px) {
    max-width: 445px;
  }

  @media (min-width: 992px) {
    max-width: 100%;
  }

  @media (min-width: 425px) {
   display: block;
  }

  input {
    width: 100%;
    height: 45px;
    padding-left: 10px;
    border: 1px solid var(--gray-400-color);
    border-radius: 6px;
  }

  input::placeholder {
    color: var(--gray-400-color);
  }
}

.search-mobile {
  display: flex;
  margin: 0;
  
  @media (min-width: 425px) {
    display: none;
  }
}


.header__catalog-btn {
  height: 45px;

  @media (max-width: 991px){
    display: none;
  }
}


.contact {
  margin: 0 40px 0 15px;
  white-space: nowrap;

  @media (max-width: 1200px){
    margin: 0 20px 0 15px;
  }

  @media (max-width: 991px){
    display: none;
  }
}

.top {
  font-weight: 700;
  font-size: 14px;
  color: var(--black-color);
}

.bott {
  font-weight: 500;
  font-size: 12px;
  color: var(--gray-600-color);
}

.auth {
  background: transparent;
  display: block;
    font-size: 12px;
    font-weight: 500;
    color: var(--gray-600-color);
    position: relative;
}
.actions {
  display: flex;
  align-items: center;
  text-align: center;
  gap: 25px;
  margin-left: auto;

  @media (max-width: 1200px){
    gap: 10px;
  }

  @media (max-width: 991px){
    display: none;
  }

  p {
    margin-bottom: 0;
  }

  a {
    display: block;
    font-size: 12px;
    font-weight: 500;
    color: var(--gray-600-color);
  }
}

.bot {
  width: 100%;
  display: flex;
  justify-content: space-between;
  overflow-x: auto;
  white-space: nowrap;
  font-size: 14px;
  font-weight: 700;
  overflow: --moz-scrollbars-none; /* Для Firefox */
  -ms-overflow-style: none; /* Для Internet Explorer и Edge */
  scrollbar-width: none; /* Для Firefox */
}

.bot::-webkit-scrollbar {
  display: none;
}

.scroll-content {
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.delivery {
  margin-right: 44px;
}

.categories {
  display: flex;
  gap: 20px;
  color: var(--black-color);
  text-decoration: none;
  margin-right: 44px;
}

.info {
  display: flex;
  gap: 20px;

  @media (max-width: 991px){
    display: none;
  }
}

.dropdown {
  position: absolute;
  top: calc(100% + 5px); 
  left: 50%;
  transform: translateX(-50%);
  background-color: #fff;
  border-radius: 10px;
  z-index: 2; 
  box-shadow: 0px 4px 10px 0px #00000026;
  list-style: none;
  padding: 16px;
  min-width: 275px;
}

.dropdown-search {
  left: 0;
  transform: none;
  width: 100%;
}

.dropdown-search li:hover svg path {
  fill: #000;
}

.search-items {
  border-top: 2px solid #F0F0F0;
  padding-top: 10px;
  gap: 10px;
  display: flex;
  flex-direction: column;
}

.dropdown li {
  height: 45px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 600;
  font-size: 14px;
  line-break: 100%;
  letter-spacing: 0;
  color: #000;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 14px;
}

.dropdown li:hover {
 background-color: #F6F6F6;
}

.dropdown li:last-child {
  margin-top: 60px;
}
</style>
