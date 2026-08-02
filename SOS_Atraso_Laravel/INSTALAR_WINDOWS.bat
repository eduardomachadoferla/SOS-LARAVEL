@echo off
chcp 65001 >nul
if not exist .env copy .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
pause
