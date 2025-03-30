<script lang="ts" setup>
import Tabs from '@/components/Tabs.vue';
import { computed, ref } from 'vue';
import RedButton from '@/components/common/Buttons/RedButton.vue';
import SocialLinks from '@/components/socialLinks/SocialLinks.vue';
import WhiteButton from '@/components/common/Buttons/WhiteButton.vue';
import IconCirclePlay from '@/components/icons/IconCirclePlay.vue';
import IconCircleInfo from '@/components/icons/IconCircleInfo.vue';

interface Props {
  firstLinkAddress: string;
  firstAddress: string;
  firstPhone: string;
  secondLinkAddress: string;
  secondAddress: string;
  secondPhone: string;
  attention?: string;
}

const props = defineProps<Props>();

enum ContactsTab {
  Shop = 'shop',
  Storage = 'storage',
}

const listTabs = [
  {
    id: ContactsTab.Shop,
    title: "Магазин",
  },
  {
    id: ContactsTab.Storage,
    title: "Склад",
  }
];

const currentTab = ref(listTabs[0].id);

const content = computed(() => {
  return {
    [ContactsTab.Shop]: {
      linkAddress: props.firstLinkAddress,
      address: props.firstAddress,
      phone: props.firstPhone
    },
    [ContactsTab.Storage]: {
      linkAddress: props.secondLinkAddress,
      address: props.secondAddress,
      phone: props.secondPhone
    },
  }
});

const currentContent = computed(() => content.value[currentTab.value]);
</script>

<template>
  <section class="contacts-main">
    <div class="contacts-main__wrapper">
      <Tabs
        v-model="currentTab"
        :list="listTabs"
        class="contacts-main__tabs-mobile"
      />

      <div class="contacts-main__map">
        <RedButton
          class="contacts-main__map-button"
          height="45px"
          text="Построить маршрут"
        />
      </div>

      <div class="contacts-main__info">
        <h1 class="contacts-main__title">
          Контакты
        </h1>

        <Tabs
          v-model="currentTab"
          theme="white"
          :list="listTabs"
          class="contacts-main__tabs-desktop"
        />

        <div class="contacts-main__info-item">
          <span>Адрес:</span>

          <a
            :href="currentContent.linkAddress"
            target="_blank"
            class="contacts-main__address"
          >{{ currentContent.address }}</a>
        </div>

        <div class="contacts-main__info-item">
          <span>Звонки по РФ:</span>

          <a :href="`tel:${currentContent.phone}`" class="contacts-main__phone">{{ currentContent.phone }}</a>
        </div>

        <div class="contacts-main__info-item">
          <span>Социальные сети:</span>

          <SocialLinks />
        </div>

        <div class="contacts-main__button-wrapper">
          <button class="contacts-main__icon-button" type="button">
            <span><IconCirclePlay /></span>
            Как нас найти
          </button>

          <WhiteButton
            class="contacts-main__phone-button"
            height="45px"
            text="Позвонить"
          />
        </div>
      </div>
    </div>

    <div v-if="props.attention" class="contacts-main__attention">
      <div class="contacts-main__attention-icon">
        <IconCircleInfo />
      </div>

      <p class="contacts-main__attention-text" v-html="props.attention" />
    </div>
  </section>
</template>

<style scoped>
.contacts-main__wrapper {
  display: flex;
  flex-direction: column;
}

.contacts-main__tabs-mobile {
  margin-bottom: 20px;
}

.contacts-main__map {
  height: 200px;
  width: 100%;
  overflow: hidden;
  border-radius: 16px;
  background-color: var(--gray-300-color);
  position: relative;
}

.contacts-main__map-button {
  display: none;
}

.contacts-main__info {
  border-radius: 16px;
  background-color: var(--gray-200-color);
  display: flex;
  flex-direction: column;
  padding: 16px;
  gap: 16px;
}

.contacts-main__title {
  color: var(--black-color);
  font-weight: 800;
  font-size: 20px;
  line-height: 24px;
  margin-bottom: 0;
  letter-spacing: -0.02em;
}

.contacts-main__info-item {
  display: flex;
  flex-direction: column;
  gap: 10px;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
}

.contacts-main__address {
  font-weight: 800;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.02em;
  text-decoration: underline;
  color: var(--black-color);
}

.contacts-main__phone {
  font-weight: 800;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.contacts-main__button-wrapper {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.contacts-main__icon-button {
  display: flex;
  align-items: center;
  padding: 0;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  outline: none;
  gap: 4px;
  width: max-content;
  border: none;
  background-color: inherit;
}

.contacts-main__icon-button span {
  font-size: 25px;
  color: var(--blue-400-color);
}

.contacts-main__phone-button {
  width: 100%;
}

.contacts-main__tabs-desktop {
  display: none;
}

.contacts-main__attention {
  display: none;
}

@media (min-width: 768px) {
  .contacts-main__map {
    height: 350px;
  }

  .contacts-main__map-button {
    display: flex;
    position: absolute;
    left: 30px;
    bottom: 30px;
  }

  .contacts-main__info {
    padding: 30px;
  }

  .contacts-main__title {
    font-size: 24px;
    line-height: 40px;
  }

  .contacts-main__address {
    font-size: 20px;
    line-height: 24px;
  }

  .contacts-main__button-wrapper {
    flex-direction: row;
  }

  .contacts-main__icon-button {
    order: 1;
  }

  .contacts-main__phone-button {
    width: 210px;
  }
}

@media (min-width: 1024px) {
  .contacts-main__tabs-mobile {
    display: none;
  }

  .contacts-main__wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .contacts-main__map {
    height: 450px;
    order: 1;
  }

  .contacts-main__info {
    height: 100%;
    gap: 10px;
  }

  .contacts-main__title {
    font-size: 34px;
  }

  .contacts-main__tabs-desktop {
    display: flex;
  }

  .contacts-main__button-wrapper {
    margin-top: auto;
  }

  .contacts-main__attention {
    display: flex;
    padding: 30px;
    gap: 20px;
    background-color: var(--blue-400-color);
    color: var(--white-color);
    font-size: 16px;
    line-height: 24px;
    font-weight: 400;
    border-radius: 20px;
    margin-top: 30px;
  }

  .contacts-main__attention-icon {
    font-size: 37px;
  }

  .contacts-main__attention-text {
    margin-bottom: 0;
  }
}

@media (min-width: 1440px) {
  .contacts-main__map {
    height: 510px;
  }
  
  .contacts-main__info {
    gap: 20px;
  }
}
</style>