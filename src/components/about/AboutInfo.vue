<script lang="ts" setup>
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import ImageCard from "@/components/cards/ImageCard.vue";
import AboutAdvantage from "@/components/about/AboutAdvantage.vue";
import { useQuestionModal } from '@/composables/useModal'

type ImageCardProps = InstanceType<typeof ImageCard>["$props"];
type AboutAdvantageProps = InstanceType<typeof AboutAdvantage>["$props"];

interface DescriptionList {
  title: string;
  text: string;
}

interface Props {
  text: string;
  card: ImageCardProps;
  descriptionList: DescriptionList[]
  advantage: AboutAdvantageProps;
}

const props = defineProps<Props>();
const { openQuestionModal } = useQuestionModal();

const onTitleButtonClick = () => {
  openQuestionModal()
}
</script>

<template>
  <section class="about-info">
    <TitleWithButton
      title="Vista sport"
      button-text="Задать вопрос"
      :on-button-click="onTitleButtonClick"
      class="about-info__title"
    />

    <p class="about-info__text" v-html="props.text" />

    <AboutAdvantage v-bind="props.advantage" />

    <template v-if="props.descriptionList.length > 0">
      <div
        v-for="item in props.descriptionList"
        :key="item.title"
        class="about-info__description"
      >
        <h3 class="about-info__description-title">
          {{ item.title }}
        </h3>

        <span v-html="item.text" />
      </div>
    </template>


    <ImageCard v-bind="props.card" />
  </section>
</template>

<style scoped>
.about-info {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.about-info__title {
  margin-bottom: -10px;
}

.about-info__description {
  display: flex;
  flex-direction: column;
  color: var(--gray-800-color);
  font-size: 16px;
  line-height: 24px;
}

.about-info__description-title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 16px;
}

@media (min-width: 768px) {
  .about-info {
    gap: 60px;
  }

  .about-info__title {
    margin-bottom: -30px;
  }
}

@media (min-width: 1024px) {
  .about-info__description-title {
    font-size: 26px;
    line-height: 31px;
  }
}
</style>