<script lang="ts" setup>
import TitleWithButton from '@/components/common/TitleWithButton.vue';
import { useRouter } from 'vue-router';
import WhiteButton from '@/components/common/Buttons/WhiteButton.vue';
import XSBlueButton from '@/components/common/Buttons/XSBlueButton.vue';

interface Props {
  ie: string;
  address: string;
  inn: string;
  ogrn: string;
  bank: string;
  bic: string;
  rs: string;
  kor: string;
}

const props = defineProps<Props>();

const router = useRouter();

function goToHome() {
  router.push({name: 'home'});
}
</script>

<template>
  <section class="about-requisites">
    <TitleWithButton
      button-text="На главную"
      title="Реквизиты"
      @button-click="goToHome"
    />

    <div class="about-requisites__wrapper">
      <div class="about-requisites__item">
        <h3 class="about-requisites__title">
          Реквизиты
        </h3>

        <div>
          <p>{{ props.ie }}</p>
          <p>{{ props.address }}</p>
          <p><strong>ИНН:</strong> {{ props.inn }}</p>
          <p><strong>ОГРН:</strong> {{ props.ogrn }}</p>
          <p><strong>Банк:</strong> {{ props.bank }}</p>
          <p><strong>БИК:</strong> {{ props.bic }}</p>
          <p><strong>Р/с:</strong> {{ props.rs }}</p>
          <p><strong>Кор/сч:</strong> {{ props.kor }}</p>
        </div>


        <div class="about-requisites__button-wrap">
          <WhiteButton
            class="about-requisites__button"
            text="Скопировать"
            height="45px"
          />

          <XSBlueButton
            class="about-requisites__button"
            text="Написать нам"
            height="45px"
          />
        </div>
      </div>
  
      <div class="about-requisites__item">
        <h3 class="about-requisites__title">
          Оставьте ваш отзыв
        </h3>

        <div>
          <p>Не только поставлять качественный инвентарь для настольного тенниса, но и способствовать развитию спорта.</p>
        </div>

        <textarea
          id=""
          class="about-requisites__textfield" 
        />

        <div class="about-requisites__button-wrap">
          <XSBlueButton
            class="about-requisites__button"
            text="Отправить отзыв"
            height="45px"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.about-requisites {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.about-requisites__wrapper {
  display: grid;
  gap: 16px;
  grid-template-columns: 1fr;
}

.about-requisites__title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 0;
}

.about-requisites__item {
  padding: 16px;
  background-color: var(--gray-200-color);
  border-radius: 16px;
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.about-requisites__item p {
  margin-bottom: 0;
}

.about-requisites__item strong {
  color: var(--black-color);
}

.about-requisites__button-wrap {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.about-requisites__button {
  width: 100%;
}

.about-requisites__textfield {
  position: relative;
  width: 100%;
  font-size: 16px;
  line-height: 24px;
  font-weight: 400;
  color: var(--gray-800-color);
  border: none;
  border-radius: 14px;
  z-index: 2;
  resize: none;
  min-height: 104px;
  max-height: 104px;
  padding: 16px;
  background-color: var(--white-color);
}

.about-requisites__textfield:focus {
  outline: none;
  border: none;
}

@media (min-width: 768px) {
  .about-requisites {
    gap: 30px;
  }

  .about-requisites__wrapper {
    gap: 30px;
  }

  .about-requisites__item {
    padding: 30px;
  }

  .about-requisites__button-wrap {
    margin-top: 14px;
    flex-direction: row;
    gap: 16px;
  }

  .about-requisites__button {
    width: 200px;
  }

  .about-requisites__textfield {
    min-height: 169px;
    max-height: 169px;
  }
}

@media (min-width: 1024px) {
  .about-requisites__wrapper {
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

  .about-requisites__item {
    height: 100%;
  }

  .about-requisites__title {
    font-size: 30px;
    line-height: 36px;
  }

  .about-requisites__button-wrap {
    margin-top: auto;
  }
}

@media (min-width: 1440px) {
  .about-requisites__title {
    font-size: 34px;
    line-height: 41px;
  }

  .about-requisites__textfield {
    min-height: 188px;
    max-height: 188px;
  }
}
</style>
