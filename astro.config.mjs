// @ts-check
import { defineConfig } from "astro/config";
import sitemap from "@astrojs/sitemap";

import tailwindcss from "@tailwindcss/vite";

// https://astro.build/config
export default defineConfig({
  integrations: [sitemap()],
  site: "http://solucionfactura.mx",

  vite: {
    plugins: [tailwindcss()],
    build: {
      cssCodeSplit: true,
      rollupOptions: {
        output: {
          manualChunks: undefined,
        },
      },
      sourcemap: false,
    },
    esbuild: {
      keepNames: false,
      legalComments: "none",
    },
    server: {
      port: 3000,
      // Optimizaciones para reducir uso de RAM
      watch: {
        // Reducir el número de archivos vigilados
        ignored: ["**/node_modules/**", "**/.git/**", "**/dist/**"],
      },
      // Reducir el tamaño del cache
      fs: {
        strict: false,
      },
    },
    // Optimizar el pre-bundling de dependencias
    optimizeDeps: {
      // Limitar el número de dependencias pre-bundleadas
      include: [],
      // Reducir el uso de memoria durante el pre-bundling
      esbuildOptions: {
        target: "esnext",
      },
    },
    // Reducir el uso de memoria en desarrollo
    cacheDir: ".vite",
    // Desactivar sourcemaps en desarrollo para ahorrar RAM
    css: {
      devSourcemap: false,
    },
  },
  build: {
    inlineStylesheets: "always",
  },
});
