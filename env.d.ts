/// <reference types="vite/client" />

interface ImportMetaEnv {
  readonly VITE_FIGMA_ACCESS_TOKEN: string
  readonly VITE_FIGMA_FILE_KEY: string
  readonly VITE_FIGMA_NODE_ID: string
}

interface ImportMeta {
  readonly env: ImportMetaEnv
}
