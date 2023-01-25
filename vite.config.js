import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            // sass("resources/scss/app.scss", "public/css")
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            // '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            // '~aos': path.resolve(__dirname, 'node_modules/aos'),
            // '~select2': path.resolve(__dirname, 'node_modules/select2'),
        }
    },
});
