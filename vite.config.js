import { fileURLToPath } from 'url'
import { sync } from 'glob'
import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'

function dirs(path) {
  return sync(path).map((file) => fileURLToPath(new URL(file, import.meta.url)))
}

export default defineConfig({
  plugins: [
    laravel({
      input: [
        ...dirs('resources/js/**/*.ts'),
        ...dirs('resources/sass/**/*.scss'),
      ],
      refresh: true,
    }),
  ],
})
