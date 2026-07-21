import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'public/build',
    manifest: 'manifest.json',
    rollupOptions: {
      input: 'resources/css/app.css',
    }
  },
  server: {
    middlewareMode: false,
    cors: true,
  }
})
