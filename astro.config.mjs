// @ts-check
import { defineConfig } from "astro/config";

// https://astro.build/config
export default defineConfig({
  server: {
    allowedHosts: [
      "rnhdb-2806-106e-15-3497-d9ca-c403-76e-8e77.a.free.pinggy.link",
    ],
  },
});
