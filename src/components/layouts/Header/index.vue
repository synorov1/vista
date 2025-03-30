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
          <input type="text" placeholder="Поиск по каталогу">
        </div>
        <a class="contact">
          <div class="top">8 (800) 234-24-20</div>
          <div class="bott">Бесплатно по России</div>
        </a>
        <div class="actions">
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

const isScrollLock = useScrollLock(document.body)

const isShowCatalog = ref(false)
const isAuthModalOpen = ref(false)
const isRecoveryModalOpen = ref(false)

const { openDiscountInfoModal } = useDiscountInfoModal()

const showCatalog = () => {
  isShowCatalog.value = !isShowCatalog.value
  isScrollLock.value = isShowCatalog.value
}

const handleAuthSuccess = (value: string) => {
  // TODO: Добавить обработку успешной авторизации
  console.log('Успешная авторизация', value)
}

const handleRecoverySuccess = (value: string) => {
  // TODO: Добавить обработку успешной смены пароля
  console.log('Пароль успешно изменен', value)
}

const actions = computed(() => [
  {
    icon: '/src/assets/icons/icon-home.svg',
    href: '/',
    text: 'Войти',
    onClick: () => isAuthModalOpen.value = true
  },
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
</style>
