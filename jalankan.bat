@echo off

color a
echo [ Aplikasi Sistem Inventory ]
color 6
echo { Coder: Fajar Firdaus }
color a
echo [/] Setup database
php artisan db:create inventory
echo [/] Setup Tables
php artisan migrate
echo [+] Running Server
php artisan serve

