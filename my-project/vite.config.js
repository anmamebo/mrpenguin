import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
                'public/js/charts/ordersPerDayChart.js',
                'public/js/charts/ordersPerCategoryChart.js',
                'resources/css/admin.scss',
                'resources/css/auth.scss',
                'resources/css/cart.scss',
                'resources/css/home.scss',
                'resources/css/info.scss',
                'resources/css/product.scss',
                'resources/css/products.scss',
                'resources/css/profile.scss',
                'resources/css/wish-list.scss',
            ],
            refresh: true,
        }),
    ],
});
