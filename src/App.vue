<template>
  <div class="app">
    <Layout :show-breadcrumbs="shouldShowBreadcrumbs" :show-header="shouldShowHeader">
      <RouterView />
    </Layout>
    <div class="modals-wrapper" :class="{ 'modals-wrapper--active': isAnyModalOpen }">
      <QuestionModal :is-open="isQuestionModalOpen" @close="closeQuestionModal" />
      <RecommendationModal :is-open="isRecommendationModalOpen" @close="closeRecommendationModal" />
      <DiscountModal :is-open="isDiscountModalOpen" @close="closeDiscountModal" />
      <DiscountInfoModal :is-open="isDiscountInfoModalOpen" @close="closeDiscountInfoModal" />
      <DeliveryModal :is-open="isDeliveryModalOpen" @close="closeDeliveryModal" />
      <SubscribeModal :is-open="isSubscribeModalOpen" @close="closeSubscribeModal" />
      <SearchModal :is-open="isSearchModalOpen" @close="closeSearchModal" />
      <ReviewModal :is-open="isReviewModalOpen" @close="closeReviewModal" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, watch, onMounted, onUnmounted, ref } from 'vue'
import { RouterView, useRoute } from 'vue-router';
import Layout from '~/components/layouts/Layout.vue';
import QuestionModal from '@/components/common/Modal/QuestionModal.vue';
import RecommendationModal from '@/components/common/Modal/RecommendationModal.vue';
import DiscountModal from '@/components/common/Modal/DiscountModal.vue';
import DiscountInfoModal from '@/components/common/Modal/DiscountInfoModal.vue'
import DeliveryModal from '@/components/common/Modal/DeliveryModal.vue'
import SubscribeModal from '@/components/common/Modal/SubscribeModal.vue'
import SearchModal from '@/components/common/Modal/SearchModal.vue'
import ReviewModal from '@/components/common/Modal/ReviewModal.vue'
import { useQuestionModal, useRecommendationModal, useDiscountModal, useDiscountInfoModal, useDeliveryModal, useSubscribeModal, useSearchModal, useReviewModal } from '@/composables/useModal'
import '@/assets/styles/variables.css';

const route = useRoute();
const shouldShowBreadcrumbs = computed(() => {
  return route.meta.showBreadcrumbs !== false;
});
const shouldShowHeader = computed(() => {
  return route.meta.showHeader !== false;
});
const { isQuestionModalOpen, closeQuestionModal } = useQuestionModal();
const { isRecommendationModalOpen, closeRecommendationModal } = useRecommendationModal();
const { isDiscountModalOpen, closeDiscountModal } = useDiscountModal();
const { isDiscountInfoModalOpen, closeDiscountInfoModal } = useDiscountInfoModal()
const { isDeliveryModalOpen, closeDeliveryModal } = useDeliveryModal()
const { isSubscribeModalOpen, closeSubscribeModal } = useSubscribeModal()
const { isSearchModalOpen, closeSearchModal } = useSearchModal()
const { isReviewModalOpen, closeReviewModal } = useReviewModal()

const isAnyModalOpen = computed(() => {
  return isQuestionModalOpen.value ||
    isRecommendationModalOpen.value ||
    isDiscountModalOpen.value ||
    isDiscountInfoModalOpen.value ||
    isDeliveryModalOpen.value ||
    isSubscribeModalOpen.value ||
    isSearchModalOpen.value ||
    isReviewModalOpen.value
})

const currentOpenModal = computed(() => {
  if (isQuestionModalOpen.value) return 'question'
  if (isRecommendationModalOpen.value) return 'recommendation'
  if (isDiscountModalOpen.value) return 'discount'
  if (isDiscountInfoModalOpen.value) return 'discountInfo'
  if (isDeliveryModalOpen.value) return 'delivery'
  if (isSubscribeModalOpen.value) return 'subscribe'
  if (isSearchModalOpen.value) return 'search'
  if (isReviewModalOpen.value) return 'review'
  return null
})

watch(currentOpenModal, (newModal) => {
  if (newModal) {
    console.log('Открыта модалка:', newModal)
  }
})

const handleScroll = () => {
  if (isAnyModalOpen.value) {
    document.body.style.overflow = 'hidden'
    document.body.style.paddingRight = '15px'
  } else {
    document.body.style.overflow = ''
    document.body.style.paddingRight = ''
  }
}


watch(isAnyModalOpen, handleScroll, { immediate: true })

onMounted(() => {
  handleScroll()
})

onUnmounted(() => {
  document.body.style.overflow = ''
  document.body.style.paddingRight = ''
})
</script>

<style scoped>
.app {
  min-height: 100vh;
  position: relative;
}

.modals-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1000;
  pointer-events: none;
}

.modals-wrapper--active {
  pointer-events: auto;
  background-color: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(2px);
  transition: background-color 0.3s ease, backdrop-filter 0.3s ease;
}

@media (max-width: 768px) {
  .modals-wrapper--active {
    backdrop-filter: none;
  }
}
</style>
