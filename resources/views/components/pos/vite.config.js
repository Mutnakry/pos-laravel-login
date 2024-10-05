import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    manifest: true,
    outDir: 'public/build', // Ensure this matches your Laravel configuration
    rollupOptions: {
      input: {
        app: 'resources/js/app.js',
      },
    },
  },
});


