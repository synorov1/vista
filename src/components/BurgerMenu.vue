<template>
  <div
    :class="[
      'burger-menu',
      {'is-open': modelValue}
    ]"
    @click="handleClick"
  >
    <span class="burger-menu__line1" />
    <span class="burger-menu__line2" />
    <span class="burger-menu__line3" />
  </div>
</template>

<script setup lang="ts">
defineOptions({
  name: 'BurgerMenu'
})

interface Props {
  modelValue?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  modelValue: false
})

const emit = defineEmits<{
  (e: 'update:modelValue', value: boolean): void
}>()

const handleClick = () => {
  emit('update:modelValue', !props.modelValue)
}
</script>

<style scoped>
.burger-menu {
  cursor: pointer;
}

.burger-menu span + span {
  margin-top: 5px;
}

.burger-menu span {
  border-radius: 50px;
  transition: all .3s ease;
}

.burger-menu__line1 {
  display: block;
  width: 23px;
  height: 2px;
  background-color: #222222;
}

.burger-menu__line2 {
  display: block;
  width: 18px;
  height: 2px;
  background-color: #222222;
}

.burger-menu__line3 {
  display: block;
  width: 13px;
  height: 2px;
  background-color: #222222;
}

.burger-menu.is-open .burger-menu__line1 {
  transform: rotate(45deg) translate(5px, 5px);
  width: 23px;
}

.burger-menu.is-open .burger-menu__line2 {
  opacity: 0;
}

.burger-menu.is-open .burger-menu__line3 {
  transform: rotate(-45deg) translate(5px, -5px);
  width: 23px;
}
</style>