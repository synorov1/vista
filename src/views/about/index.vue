<script lang="ts" setup>
import data from '@/views/about/about.json';
import AboutMain from '@/components/about/AboutMain.vue';
import AboutInfo from '@/components/about/AboutInfo.vue';
import AboutTeam from '@/components/about/AboutTeam.vue';
import AboutRequisites from '@/components/about/AboutRequisites.vue';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('О компании');
</script>

<template>
  <div class="about">
    <AboutMain :image="data.image" :text="data.text" />

    <AboutInfo
      :text="data.info.text"
      :card="data.card"
      :description-list="data.descriptionList"
      :advantage="data.advantage"
    />

    <AboutTeam :teams="data.teams" />

    <AboutRequisites
      :ie="data.requisites.ie"
      :address="data.requisites.address"
      :inn="data.requisites.inn"
      :ogrn="data.requisites.ogrn"
      :bank="data.requisites.bank"
      :bic="data.requisites.bic"
      :rs="data.requisites.rs"
      :kor="data.requisites.kor"
    />
  </div>
</template>

<style scoped>
.about {
  display: flex;
  flex-direction: column;
  gap: 40px;
  margin-bottom: 40px;
}

@media (min-width: 768px) {
  .about {
    gap: 60px;
    margin-bottom: 60px;
  }
}

@media (min-width: 1024px) {
  .about {
    gap: 80px;
    margin-bottom: 80px;
  }
}

@media (min-width: 1440px) {
  .about {
    gap: 100px;
    margin-bottom: 100px;
  }
}
</style>