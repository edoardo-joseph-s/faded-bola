import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'public/build',
    emptyOutDir: true,
    copyPublicDir: false,
    rolldownOptions: {
      input: 'resources/css/app.css',
      output: {
        assetFileNames: 'assets/[name][extname]',
      },
    },
  },
})
