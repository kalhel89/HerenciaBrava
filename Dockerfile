# ---------- 1) Etapa de build ----------
FROM php:8.3-cli AS build

# Instala system deps + Composer + Node
RUN apt-get update -y && \
    apt-get install -y git curl unzip nano && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# Cache composer
COPY composer.* ./
RUN composer install --no-dev --prefer-dist --no-scripts

# Copia resto del proyecto
COPY . .

# Compila assets
RUN npm install && npm run build && \
    php artisan key:generate --force

# ---------- 2) Etapa final más liviana ----------
FROM php:8.3-cli

RUN apt-get update -y && \
    apt-get install -y sqlite3 libsqlite3-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_sqlite

WORKDIR /app
COPY --from=build /app /app

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
