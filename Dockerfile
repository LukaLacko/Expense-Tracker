FROM php:8.4-cli

# Instalacija zavisnosti
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev \
    libxml2-dev libzip-dev libsodium-dev \
    default-libmysqlclient-dev libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip sodium

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instalacija kompozera
RUN composer install --optimize-autoloader --no-dev --no-interaction --ignore-platform-reqs

# --- OVDE JE PROMENA ---
# Brišemo liniju koja kopira .env.example jer Railway sam ubacuje varijable!
# Dodajemo dozvole za storage folder
RUN chmod -R 777 storage bootstrap/cache

# Port koji Railway koristi
EXPOSE 8000

# Popravljen CMD sa dinamičkim portom
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}