import { onMounted, onUnmounted } from 'vue'

export function usePageTitle(title: string) {
  const defaultTitle = 'Vista'

  onMounted(() => {
    document.title = `${title} | ${defaultTitle}`
  })

  onUnmounted(() => {
    document.title = defaultTitle
  })
} 