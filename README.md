# StudioX Laravel Containers

This repo provides a Docker Compose setup for Laravel with:
- PHP 8.3 FPM (API runtime) Laravel 12
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

```

## OpenAPI

The OpenAPI spec is available at:

- ./openapi.yaml

The file is generated from the Laravel controllers (OpenAPI attributes) inside `./app`.

### Regenerate

Run inside Docker:

```bash
docker compose exec -T php-fpm composer openapi:generate
docker compose exec -T php-fpm composer openapi:sync-root
```

- `openapi:generate` updates `./app/openapi.yaml` (this is what `http://localhost:8080/openapi.yaml` serves)
- `openapi:sync-root` copies `./app/openapi.yaml` to `./openapi.yaml`

You can view it by opening the file in Swagger Editor or any OpenAPI UI.
You can also open the built-in docs UI at:

- http://localhost:8080/docs

## Endpoint examples

```bash
# All products (paginated)
"http://localhost:8080/api/products"

# Filter by title/content
"http://localhost:8080/api/products?title={some_text}&content={some_text}"

# Filter by price range
"http://localhost:8080/api/products?min_price=10&max_price=100"

# All categories with products_count
"http://localhost:8080/api/categories"
```

## Implementation notes (BG)

Как е подходил към реализацията:

1. Добавих Docker контейнери за PHP, MySQL и Nginx сървър.
2. След това добавих модели и seed-ове за двете таблици — products и categories. По този начин създадох тестови данни в базата.
3. Добавих контролери и сървиси, където се намира логиката на двата ендпойнта. Добавих и маршрути (routes) за двата ендпойнта.
4. Добавих OpenAPI документация.

Какви технически решения е взел:

- Laravel 12 (PHP 8.3)
- MySQL 8.0
- Nginx 1.27 (Alpine)
- Docker Compose
- OpenAPI 3.0.3 + Swagger UI (CDN v5)

Как би надградил решението в реална production среда:

Бих добавил unit и feature тестове, въпреки че за проект с едва два ендпойнта това може да бъде прекалено.

## MySQL connection

- Host: 127.0.0.1
- Port: 3307
- User: studiox
- Password: studiox
- Database: studio_x

## Notes

- The Nginx server expects Laravel's `public/` folder at `./app/public`.
