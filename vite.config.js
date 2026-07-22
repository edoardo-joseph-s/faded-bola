import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'public',
    emptyOutDir: false,
    copyPublicDir: false,
    rolldownOptions: {
      input: 'resources/css/app.css',
      output: {
        assetFileNames: 'css/[name][extname]',
      },
    },
  },
})
