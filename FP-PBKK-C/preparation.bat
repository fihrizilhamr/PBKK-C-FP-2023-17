@echo off

echo Running composer install...
composer install

echo Copying .env.example to .env...
copy .env.example .env

echo Generating application key...
php artisan key:generate

echo Running database migrations...
php artisan migrate

echo Running npm install...
npm install

echo Script completed.
