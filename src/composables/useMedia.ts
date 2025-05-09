import { onMounted, onUnmounted, ref, computed } from "vue";

interface BreakpointOptions {
  mobile?: number;
  tablet?: {
    min: number;
    max: number;
  };
  desktop?: number;
}

const defaultBreakpoints: BreakpointOptions = {
  mobile: 768,
  tablet: {
    min: 768,
    max: 1000
  },
  desktop: 1439
};

export const useMedia = (options?: BreakpointOptions) => {
  const breakpoints = options 
    ? { 
        mobile: options.mobile ?? defaultBreakpoints.mobile,
        tablet: options.tablet ?? defaultBreakpoints.tablet,
        desktop: options.desktop ?? defaultBreakpoints.desktop 
      } 
    : defaultBreakpoints;

  const windowWidth = ref(0);
  
  const isMobileScreen = computed(() => 
    windowWidth.value < (breakpoints.mobile ?? 0)
  );
  
  const isTabletScreen = computed(() => {
    const min = breakpoints.tablet?.min ?? 0;
    const max = breakpoints.tablet?.max ?? Infinity;
    return windowWidth.value >= min && windowWidth.value < max;
  });
  
  const isDesktopScreen = computed(() => 
    windowWidth.value > (breakpoints.desktop ?? 0)
  );

  function checkScreenSize() {
    windowWidth.value = window.innerWidth;
  }

  onMounted(() => {
    window.addEventListener("resize", checkScreenSize);
    checkScreenSize();
  });

  onUnmounted(() => {
    window.removeEventListener("resize", checkScreenSize);
  });

  return {
    windowWidth,
    isMobileScreen,
    isTabletScreen,
    isDesktopScreen,
  }
}