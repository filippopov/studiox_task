# StudioX Laravel Containers

This repo provides a Docker Compose setup for Laravel with:
- PHP 8.3 FPM (API runtime)
- MySQL 8.0 (host port 3307 for HeidiSQL)
- Nginx (host port 8080)

## Start

```bash
docker compose up -d --build
```

## Laravel app location

Place your Laravel project in the `./app` folder.

## Common commands

```bash
# Composer or artisan
docker compose exec php-fpm composer install
docker compose exec php-fpm php artisan key:generate
docker compose exec php-fpm php artisan migrate

# Tests
docker compose exec php-fpm php artisan test
```

## HeidiSQL connection

- Host: 127.0.0.1
- Port: 3307
- User: studiox
- Password: studiox
- Database: studio_x

## Notes

- The Nginx server expects Laravel's `public/` folder at `./app/public`.
