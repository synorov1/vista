<script lang="ts" setup>
import IconEdit from '@/components/icons/IconEdit.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import WhiteButton from '@/components/common/Buttons/WhiteButton.vue';
import IconCircleInfo from '@/components/icons/IconCircleInfo.vue';
import data from '@/views/profile/data.json'
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Личный кабинет');
</script>

<template>
  <section class="profile">
    <div class="profile__block profile__block_info">
      <div class="profile__item">
        <p class="profile__title">
          {{ `${data.surname} ${data.name} ${data.patronymic}` }}
        </p>

        <p class="profile__description">
          {{ data.birthday }}
        </p>
      </div>

      <div class="profile__item">
        <p class="profile__description">
          Email
        </p>

        <div class="proflie__email-wrap">
          <a class="proflie__email" :href="`mailto:${data.email}`">{{ data.email }}</a>

          <div class="proflie__email-icon">
            <IconEdit />
          </div>
        </div>
      </div>

      <div class="profile__item">
        <p class="profile__description">
          Номер телефона
        </p>

        <a class="proflie__phone" :href="`tel:${data.phone}`">{{ data.phone }}</a>
      </div>

      <div class="profile__button-wrap">
        <WhiteButton
          text="Сменить пароль"
          class="w-100"
          height="45px"
        />

        <XSBlueButton
          text="Выйти из аккаунта"
          class="w-100"
          height="45px"
        />
      </div>
    </div>
  
    <div class="profile__block profile__block_action">
      <div class="profile__item">
        <p class="profile__title">
          Скидка
        </p>

        <p class="profile__description">
          На товары в интернет-магазине
        </p>
      </div>

      <a class="profile__button-link" href="#">
        Хочу получить скидку

        <span class="profile__button-icon">
          <IconCircleInfo />
        </span>
      </a>

      <a href="#" class="profile__banner">
        <div class="profile__banner-top">
          <p class="profile__banner-title">
            {{ data.banner.title }}
          </p>

          <div class="profile__banner-icon">
            <IconCircleInfo />
          </div>
        </div>

        <p v-for="(item, index) in data.banner.text" :key="index">{{ item }}</p>
      </a>
    </div>

    <div class="profile__block profile__block_address">
      <div class="profile__info">
        <div class="profile__item">
          <p class="profile__title">
            Адрес доставка
          </p>

          <p class="profile__description">
            <!-- TODO мб будет 1 или 10, а склонять слово "адреса (1 адрес\2 адреса\10 адресов)" такое себе -->
            {{ data.address.count }}
          </p>
        </div>

        <div
          v-for="(item, index) in data.address.names"
          :key="index"
          class="profile__item"
        >
          <p class="profile__description">
            Адрес
          </p>

          <p class="profile__subtitle">
            {{ item }}
          </p>
        </div>
      </div>

      <div class="profile__delivery">
        <span>Ближайшие доставки</span>
        
        <a class="profile__button-link" href="#">
          Нет

          <span class="profile__button-icon">
            <IconCircleInfo />
          </span>
        </a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.profile {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-bottom: 40px;
}

.profile__block {
  display: flex;
  flex-direction: column;
  gap: 16px;
  border-radius: 16px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
  background-color: var(--white-color);
}

.profile__block_info {
  background-color: var(--gray-200-color);
  border: none;
}

.profile__title {
  font-weight: 800;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  margin-bottom: 0;
  color: var(--black-color);
}

.profile__description {
  margin-bottom: 0;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
}

.profile__item {
  display: flex;
  flex-direction: column;
  gap: 6px;
  width: 100%;
}

.proflie__email-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
}

.proflie__email {
  color: var(--blue-400-color);
  font-weight: 800;
  font-size: 18px;
  line-height: 22px;
  letter-spacing: -0.02em;
}

.proflie__email-icon {
  color: var(--gray-600-color);
  font-size: 20px;
}

.proflie__phone {
  color: var(--black-color);
  font-weight: 800;
  font-size: 18px;
  line-height: 22px;
  letter-spacing: -0.02em;
}

.profile__button-wrap {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.profile__button-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 16px;
  color: var(--black-color);
  gap: 5px;
  border-radius: 6px;
  border: 1px solid var(--gray-400-color);
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s;
  line-height: 17px;
  width: 100%;

  &:hover {
    border-color: var(--black-color);
  }
}

.profile__button-icon {
  font-size: 17px;
  color: var(--gray-600-color);
  flex-shrink: 0;
}

.profile__banner {
  background: linear-gradient(109.07deg, #0084FF 5.77%, #B1A9F6 98.72%);
  border-radius: 14px;
  display: flex;
  flex-direction: column;
  color: var(--white-color);
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  padding: 16px;
}

.profile__banner p {
  margin-bottom: 0;
}

.profile__banner > p {
  margin-top: 20px;
}

.profile__banner-top {
  display: flex;
  justify-content: space-between;
  gap: 5px;
}

.profile__banner-title {
  font-weight: 800;
  font-size: 34px;
  line-height: 41px;
  letter-spacing: -0.02em;
}

.profile__banner-icon {
  font-size: 24px;
  flex-shrink: 0;
}

.profile__subtitle {
  font-weight: 800;
  font-size: 16px;
  line-height: 20px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 0;
}

.profile__delivery {
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.profile__info {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

@media (min-width: 768px) {
  .profile {
    margin-bottom: 60px;
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .profile__block_address {
    grid-column: span 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .profile__block_action {
    order: -1;
  }

  .profile__block {
    padding: 30px;
  }

  .profile__title {
    font-size: 24px;
    line-height: 29px;
  }

  .profile__banner {
    margin-top: 12px;
    padding: 20px;
  }

  .profile__button-wrap {
    margin-top: auto;
  }

  .profile__subtitle {
    font-size: 18px;
    line-height: 22px;
  }
}

@media (min-width: 1024px) {
  .profile {
    margin-bottom: 80px;
  }

  .profile__block > * {
    width: 320px;
  }

  .profile__delivery {
    margin-left: auto;
  }

  .profile__block_action .profile__button-link {
    margin-top: 14px;
  }
  .profile__block_action .profile__banner {
    margin-top: -10px;
  }

  .profile__info,
  .profile__block {
    gap: 20px;
  }

  .profile__banner-top {
    margin-top: -12px;
  }

  .profile__banner-top + p {
    margin-top: 0;
  }

  .profile__banner-icon {
    padding-top: 12px;
  }

  .profile__banner-title {
    font-size: 60px;
    line-height: 73px;
  }
}

@media (min-width: 1440px) {
  .profile {
    margin-bottom: 100px;
    grid-template-columns: 1fr 1fr 1fr;
  }

  .profile__block_address {
    grid-column: auto;
    display: flex;
    order: -1;
  }

  .profile__delivery {
    margin-top: auto;
  }

  .profile__block > * {
    width: 100%;
  }

  .profile__block_action .profile__button-link {
    margin-top: auto;
  }
}
</style>
