import { ref, computed } from 'vue'

export enum ModalType {
  QUESTION = 'question',
  RECOMMENDATION = 'recommendation',
  DISCOUNT = 'discount',
  DISCOUNT_INFO = 'discountInfo',
  DELIVERY = 'delivery',
  SUBSCRIBE = 'subscribe',
  SEARCH = 'search',
  REVIEW = 'review'
}

const modalsState = ref<Record<ModalType, boolean>>({
  [ModalType.QUESTION]: false,
  [ModalType.RECOMMENDATION]: false,
  [ModalType.DISCOUNT]: false,
  [ModalType.DISCOUNT_INFO]: false,
  [ModalType.DELIVERY]: false,
  [ModalType.SUBSCRIBE]: false,
  [ModalType.SEARCH]: false,
  [ModalType.REVIEW]: false
})

export const useModal = (type: ModalType) => {
  const isOpen = computed(() => modalsState.value[type])

  const closeAllModals = () => {
    Object.keys(modalsState.value).forEach((key) => {
      modalsState.value[key as ModalType] = false
    })
  }

  const openModal = () => {
    closeAllModals()
    modalsState.value[type] = true
    console.log('openModal', modalsState.value, isOpen.value, type)
  }

  const closeModal = () => {
    console.log('closeModal', modalsState.value, isOpen.value, type)
    modalsState.value[type] = false
  }

  return {
    isOpen,
    openModal,
    closeModal
  }
}

export const useQuestionModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.QUESTION)
  return {
    isQuestionModalOpen: isOpen,
    openQuestionModal: openModal,
    closeQuestionModal: closeModal
  }
}

export const useRecommendationModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.RECOMMENDATION)
  return {
    isRecommendationModalOpen: isOpen,
    openRecommendationModal: openModal,
    closeRecommendationModal: closeModal
  }
}

export const useDiscountModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.DISCOUNT)
  return {
    isDiscountModalOpen: isOpen,
    openDiscountModal: openModal,
    closeDiscountModal: closeModal
  }
}

export const useDiscountInfoModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.DISCOUNT_INFO)
  return {
    isDiscountInfoModalOpen: isOpen,
    openDiscountInfoModal: openModal,
    closeDiscountInfoModal: closeModal
  }
}

export const useDeliveryModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.DELIVERY)
  return {
    isDeliveryModalOpen: isOpen,
    openDeliveryModal: openModal,
    closeDeliveryModal: closeModal
  }
}

export const useSubscribeModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.SUBSCRIBE)
  return {
    isSubscribeModalOpen: isOpen,
    openSubscribeModal: openModal,
    closeSubscribeModal: closeModal
  }
} 

export const useSearchModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.SEARCH)
  return {
    isSearchModalOpen: isOpen,
    openSearchModal: openModal,
    closeSearchModal: closeModal
  }
} 

export const useReviewModal = () => {
  const { isOpen, openModal, closeModal } = useModal(ModalType.REVIEW)
  return {
    isReviewModalOpen: isOpen,
    openReviewModal: openModal,
    closeReviewModal: closeModal
  }
} 