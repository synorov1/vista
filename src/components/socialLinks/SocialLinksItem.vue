<script lang="ts" setup>
const props = defineProps({
  href: {
    type: String,
    default: '',
  },
  image: {
    type: String,
    required: true,
  },
  alt: {
    type: String,
    default: '',
  },
})
</script>

<template>
  <component
    :is="props.href ? 'a' : 'button'"
    :href="props.href || null"
    :target="props.href ? '_blank' : null"
    class="social-links-item"
  >
    <img
      :src="props.image"
      :alt="props.alt"
      class="social-links-item__image"
    >
  </component>
</template>

<style scoped>
.social-links-item {
  width: 45px;
  height: 45px;
  background-color: rgba(0, 132, 255, 0.1);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  color: var(--black-color);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  border: none;
}

.social-links-item__image {
  width: 24px;
  height: 24px;
  display: block;
}

@media (min-width: 768px) {  
  .social-links-item {
    font-size: 28px;
    line-height: 34px;
    width: 55px;
    height: 55px;
  }

  .social-links-item__image {
    width: 30px;
    height: 30px;
  }
}

@media (min-width: 1024px) {  
  .social-links-item {
    font-size: 34px;
    line-height: 41px;
    width: 45px;
    height: 45px;
  }

  .social-links-item__image {
    width: 24px;
    height: 24px;
  }
}

@media (min-width: 1440px) {  
  .social-links-item {
    font-size: 34px;
    line-height: 41px;
    width: 45px;
    height: 45px;
  }
}
</style>