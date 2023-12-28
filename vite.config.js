import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/main.css',
                'resources/js/app.js',
                'resources/css/fontawesome-free.min.css',
                'resources/css/dataTables.bootstrap4.min.css',
                'resources/css/datatables-responsive-bootstrap4.min.css',
                'resources/css/datatables-buttons-bootstrap4.min.css',
                'resources/css/adminlte.min.css',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
