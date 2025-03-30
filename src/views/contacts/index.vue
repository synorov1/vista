<script lang="ts" setup>
import ContactsMain from '@/components/contacts/ContactsMain.vue';
import ContactsScheme from '@/components/contacts/ContactsScheme.vue';
import ArrowCard from '@/components/cards/ArrowCard.vue';
import data from '@/views/contacts/contacts.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Контакты');
</script>

<template>
  <div class="contacts">
    <ContactsMain
      :first-link-address="data.firstLinkAddress"
      :first-address="data.firstAddress"
      :first-phone="data.firstPhone"
      :second-link-address="data.secondLinkAddress"
      :second-address="data.secondAddress"
      :second-phone="data.secondPhone"
      :attention="data.attention"
      class="contacts__main"
    />

    <ContactsScheme
      :text="data.scheme.text"
      :images="data.scheme.images"
      class="contacts__scheme"
    />

    <div v-if="data.items.length > 0" class="contacts__scheme__cards">
      <ArrowCard
        v-for="(item, index) in data.items"
        :key="index"
        :title="item.title"
        :text="item.text"
        :icon="item.icon"
        to="/"
      />
    </div>
  </div>
</template>

<style scoped>
.contacts__main,
.contacts__scheme,
.contacts__scheme__cards {
  margin-bottom: 40px;
}

.contacts__scheme__cards {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

@media (min-width: 768px) {
  .contacts__main,
  .contacts__scheme,
  .contacts__scheme__cards {
    margin-bottom: 60px;
  }
}

@media (min-width: 1024px) {
  .contacts__main {
    margin-bottom: 80px;
  }

  .contacts__scheme__cards {
    display: grid;
    gap: 30px;
    grid-template-columns: 1fr 1fr 1fr;
  }
}

@media (min-width: 1440px) {
  .contacts__scheme,
  .contacts__scheme__cards {
    margin-bottom: 80px;
  }
}
</style>