<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig } from 'vue3-carousel';
import TitleWithButton from '@/components/common/TitleWithButton.vue';
import { useRouter } from 'vue-router';
import AboutTeamCard from '@/components/about/AboutTeamCard.vue';

type AboutTeamCardProps = InstanceType<typeof AboutTeamCard>["$props"];

interface Props {
  teams: AboutTeamCardProps[]
}

const props = defineProps<Props>();

const router = useRouter();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 1,
  wrapAround: true,
  gap: 16,
  breakpoints: {
    768: {
      itemsToShow: 3,
    },
    1024: {
      itemsToShow: 4,
    },
    1440: {
      itemsToShow: 5,
    },
  },
  itemsToScroll: 1,
  height: '',
  i18n: {},
  enabled: true,
  transition: 2000,
  autoplay: 600,
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  slideEffect: 'slide',
};

function goToHome() {
  router.push({name: 'home'});
}
</script>

<template>
  <section class="about-team">
    <TitleWithButton
      button-text="На главную"
      title="Наша команда"
      class="about-team__title"
      @button-click="goToHome"
    />

    <Carousel
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(item, index) in props.teams"
        :key="index"
        class="about-team__slide"
      >
        <AboutTeamCard
          :image="item.image"
          :name="item.name"
          :description="item.description"
          :phone="item.phone"
          :email="item.email"
        />
      </Slide>

      <template #addons>
        <CarouselPagination class="about-team__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </section>
</template>

<style scoped>
.about-team {
  padding-bottom: 30px;
}

.about-team__slide {
  display: block;
  text-align: left;
}

.about-team__pagination {
  bottom: -30px;
}

.about-team__title {
  margin-bottom: 20px;
}

@media (min-width: 768px) {
  .about-team__title {
    margin-bottom: 30px;
  }
}
</style>