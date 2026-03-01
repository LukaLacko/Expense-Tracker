#!/bin/bash
cat > .env << EOF
APP_NAME=Laravel
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=${APP_URL}

DB_CONNECTION=mysql
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}

SESSION_DRIVER=file
CACHE_STORE=file
LOG_CHANNEL=stack
LOG_LEVEL=debug
EOF

php artisan key:generate --force
php artisan migrate --force
php artisan db:seed --force
php artisan serve --host=0.0.0.0 --port=8000