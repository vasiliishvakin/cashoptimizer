import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import dns from 'dns'
import path from 'path'

dns.setDefaultResultOrder('verbatim');
export default defineConfig({
    server: {
        //...your other config
        host: '0.0.0.0',
        port: 5173,
        origin: 'http://localhost:5173',
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
            interval: 300,
            binaryInterval: 1000,
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
