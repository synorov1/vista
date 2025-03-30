import { onMounted, onUnmounted, ref } from "vue";

export const useMedia = () => {
  const isMobileScreen = ref(false);
  const isDesktopScreen = ref(false);

  function checkScreenSize() {
    isMobileScreen.value = window.innerWidth < 768;
    isDesktopScreen.value = window.innerWidth > 1439;
  }

  onMounted(() => {
    window.addEventListener("resize", checkScreenSize);
    checkScreenSize();
  });

  onUnmounted(() => {
    window.removeEventListener("resize", checkScreenSize);
  });

  return {
    isMobileScreen,
    isDesktopScreen,
  }
}