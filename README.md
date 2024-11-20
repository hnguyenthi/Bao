## Install packages

- composer install
- npm install

## Run migrations to create all your database tables.

- php artisan migrate

## Start artisan server for the Laravel backend. Default port is 8000, so you should reach it at http://localhost:8000

- composer run dev

## Compile the front end files

- npm run dev

## Run mode SSR

- npm run build
- php artisan inertia:start-ssr
