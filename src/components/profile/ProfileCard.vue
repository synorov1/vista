<script lang="ts" setup>
import LabelInfo from '@/components/common/LabelInfo.vue';

type LabelInfoProps = InstanceType<typeof LabelInfo>["$props"];

interface Props {
  image: string;
  name: string;
  price: string;
  oldPrice?: string;
  link: string;
  params?: LabelInfoProps[]
}

const props = withDefaults(defineProps<Props>(), {
  params: () => [],
  oldPrice: '',
});
</script>

<template>
  <a
    :href="props.link"
    class="profile-card"
  >
    <div class="profile-card__image-wrap">
      <img  
        :src="props.image"
        alt="profile image card"
        class="profile-card__image"
      >
    </div>

    <div class="profile-card__info">
      <span class="profile-card__name">
        {{ props.name }}
      </span>

      <div class="profile-card__price">
        <span>{{ props.price }}</span>

        <span v-if="props.oldPrice" class="profile-card__price-old">{{ props.oldPrice }}</span>
      </div>

      <div v-if="props.params.length > 0" class="profile-card__params">
        <LabelInfo
          v-for="param in props.params"
          :key="param.title"
          :title="param.title"
          :text="param.text"
        />
      </div>
    </div>
  </a>
</template>

<style scoped>
.profile-card {
  display: flex;
  flex-direction: column;
  gap: 20px;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.02em;
}

.profile-card__image-wrap {
  border-radius: 20px;
  border: 1px solid var(--gray-400-color);
  overflow: hidden;
  height: 120px;
  width: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-card__image {
  display: block;
  width: 58px;
  height: 58px;
  object-fit: contain;
}

.profile-card__name {
  font-weight: 700;
  color: var(--black-color);
}

.profile-card__price {
  display: flex;
  gap: 10px;
  align-items: center;
  color: var(--blue-400-color);
  font-weight: 800;
}

.profile-card__price-old {
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  letter-spacing: 0;
  text-decoration: line-through;
  color: var(--gray-600-color);
}

.profile-card__info {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.profile-card__params {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

@media (min-width: 768px) { 
  .profile-card {
    flex-direction: row;
    align-items: center;
  }

  .profile-card__image-wrap {
    flex-shrink: 0;
  }
}
</style>