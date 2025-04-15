<script lang="ts" setup>
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
  image: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <section :class="$style.postBanner">
    <div :class="$style.content">
      <h3 :class="$style.title">
        {{ props.title }}
      </h3>

      <p :class="$style.text">
        {{ props.text }}
      </p>
    </div>

    <img
      :src="props.image"
      :class="$style.image"
      alt="Banner image"
    >
  </section>
</template>

<style module>
.postBanner {
  width: 100%;
  border-radius: 16px;
  background-color: #8CFF63;
  padding-top: 30px;
  text-align: center;
  color: var(--black-color);
  display: flex;
  flex-direction: column;
}

.content {
  padding-left: 30px;
  padding-right: 30px;
  margin-bottom: 20px;
}

.title {
  font-size: 24px;
  font-weight: 800;
  line-height: 29px;
  letter-spacing: -0.02em;
  margin-bottom: 10px;
  padding-left: 30px;
  padding-right: 30px;
}

.text {
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
  margin-bottom: 20px;
}

.image {
  margin-top: auto;
  width: 100%;
  display: block;
  object-fit: contain;
  height: 200px;
}

@media (min-width: 768px) {
  .content {
    padding-left: 74px;
    padding-right: 74px;
    margin-bottom: 30px;
  }

  .title {
    font-size: 30px;
    line-height: 36px;
  }

  .image {
    height: 300px;
    object-fit: cover;
  }
}

@media (min-width: 1440px) {
  .content {
    padding-left: 30px;
    padding-right: 30px;
    margin-bottom: 37px;
  }
}
</style>