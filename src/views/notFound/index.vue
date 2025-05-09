<template>
  <div :class="$style.pageContainer">
    <div :class="$style.title">
      <img
        src="@/assets/images/404.png"
        alt="404-img"
        :class="$style.titleImg"
      >
    </div>
    <p :class="$style.errorText">
      К сожалению, произошла ошибка. Пожалуйста, попробуйте ещё раз или воспользуйтесь поиском.
    </p>
    <div :class="$style.buttonContainer">
      <XSBlueButton
        text="На главную"
        :class="$style.button"
        @click="goHome"
      />
    </div>
  </div>
</template>
<script setup lang="ts">
import XSBlueButton from '@/components/common/Buttons/XSBlueButton.vue';
import { useRouter } from 'vue-router';
import { usePageTitle } from '@/composables/usePageTitle';

const router = useRouter();

usePageTitle('Страница не найдена');

const goHome = () => {
  router.push('/');
};
</script>
<style module>
.pageContainer {
  position: relative;
  background: linear-gradient(106.18deg, #0084FF 5.07%, #7DC0FF 61.25%);
  border-radius: 20px;
  padding: 16px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 450px;
  margin-top: 30px;
  margin-bottom: 80px;
}

.pageContainer:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url("@/assets/images/404-circle.png");
  background-repeat: no-repeat;
  background-size: cover;
}

.title {
  display: flex;
  justify-content: center;
  align-items: center;
}

.titleImg {
  max-width: 179px;
  max-height: 119px;
}

.errorText {
  max-width: 463px;
  color: var(--white-color);
  font-weight: 400;
  font-size: 18px;
  line-height: 30px;
  text-align: center;
  margin: 0;
}

.buttonContainer {
  display: flex;
  gap: 16px;
  margin-top: 50px;
  flex-wrap: wrap;
}

.button {
  flex-grow: 1;
  min-width: 160px;
  display: flex;
  flex-direction: column;
  align-items: stretch;
}
</style>