import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'vite-plugin-laravel';

export default defineConfig({
  server: {
    host: '0.0.0.0',
    port: 3000,
  },
  plugins: [vue(), laravel()],
  build: {
    rollupOptions: {
      output: {
        manualChunks: id => {
          if (id.includes('node_modules')) {
            if (id.includes('balm-ui')) {
              return 'vendor_bui';
            }

            return 'vendor';
          }
        },
      },
    },
  },
});
