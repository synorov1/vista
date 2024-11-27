<template>
  <div>
    <div class='footer-container' :key="count">
      <InputFormFooter class="input-form-footer" />
      <ContactsFooter class="contacts-footer" />
      <MenuFooter class="menu-footer" />
    </div>
  </div>
</template>

<script setup lang="ts">
import InputFormFooter from '~/components/layouts/Footer/InputFormFooter.vue';
import ContactsFooter from '~/components/layouts/Footer/ContactsFooter.vue';
import MenuFooter from '~/components/layouts/Footer/MenuFooter.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const count = ref(0);

const handleResize = () => {
  count.value++;
}

onMounted(() => {
  window.addEventListener('resize', handleResize);
})
onUnmounted(() => {
  window.removeEventListener('resize', handleResize);
})
</script>

<style scoped>
.footer-container {
  display: flex;
  flex-direction: column;
}

@media (min-width: 768px) {
  .footer-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem 1.6rem;
  }

  .contacts-footer {
    order: 1;
  }

  .input-form-footer {
    order: 2;
  }

  .menu-footer {
    grid-column: span 2;
    order: 3;
  }
}

@media (min-width: 1024px) {
  .footer-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8rem 3rem;
  }

  .contacts-footer {
    order: 2;
  }

  .input-form-footer {
    order: 1;
  }

  .menu-footer {
    grid-column: span 2;
    order: 3;
  }
}

.footer-container > div {
  flex: 1 1 50%;
  height: 100%;
}

@media (min-width: 1440px) {
  .footer-container {
    gap: 10rem 3rem;
  }
}
</style>
