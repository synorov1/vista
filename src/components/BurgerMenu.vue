<script setup lang="ts">
  import { ref } from "vue";
  import {useVModel} from "@vueuse/core";

  const props = defineProps({
    modelValue: {
      type: Boolean,
      required: true,
    }
  })

  const emit = defineEmits(['update:modelValue']);
  const modelValue = useVModel(props, 'modelValue', emit)
</script>

<template>
  <div :class="[
      'burger-menu',
      {'is-open': modelValue}
  ]">
    <span class="burger-menu__line1"></span>
    <span class="burger-menu__line2"></span>
    <span class="burger-menu__line3"></span>
  </div>
</template>

<style scoped>
 .burger-menu {
   span + span {
     margin-top: 5px;
   }

   span {
     border-radius: 50px;
     transition: all .3s ease;
   }
 }

 .burger-menu__line1{
   display: block;
   width: 23px;
   height: 2px;
   background-color: #222222;
 }
 .burger-menu__line2{
   display: block;
   width: 18px;
   height: 2px;
   background-color: #222222;
 }
 .burger-menu__line3{
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