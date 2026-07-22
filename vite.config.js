import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'public/build',
    cssCodeSplit: false,
    rollupOptions: {
      input: 'resources/css/app.css',
      output: {
        assetFileNames: 'assets/[name][extname]',
      },
    },
  },
})
