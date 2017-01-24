#!/bin/bash
echo "Pokrecem nephodno pre commit-a"
echo "========================================================================="
echo "MySQL drop db, create db"
echo "========================================================================="
mysqladmin -uroot -proot drop wing
mysqladmin -uroot -proot create wing
echo "==================== Composer dump autoload===================="
composer dump-autoload
echo "==================== Artisan migrate:reset===================="
php artisan migrate:reset
echo "==================== Artisan migrate===================="
php artisan migrate
echo "==================== Artisan db:seed===================="
php artisan db:seed
echo "==================== Ispod ove linije se nalaze sve greske u kodu===================="
vendor/bin/phpcs --standard=vendor/pragmarx/laravelcs/Standards/Laravel/ app
echo "==================== Ako nema gresaka mozes izvrsiti commit===================="
echo "======================================================"
echo "git status"
git status
echo "======================================================"
composer dump-autoload