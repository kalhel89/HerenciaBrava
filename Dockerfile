# ---------- 1) Etapa de build ----------
FROM php:8.3-cli AS build

# Deps del sistema + Composer + Node 20
RUN apt-get update -y && \
    apt-get install -y git curl unzip nano && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# 1. Instalar dependencias PHP
COPY composer.* ./
RUN composer install --no-dev --prefer-dist --no-scripts

# 2. Copiar proyecto completo
COPY . .

# 3. Generar la APP_KEY *antes* de compilar Vite
RUN php artisan key:generate --force

# 4. Instalar dependencias JS (usar --legacy-peer-deps para evitar conflictos)
RUN npm install --legacy-peer-deps

# 5. Compilar Vite
RUN npm run build

# ---------- 2) Etapa final ----------
FROM php:8.3-cli

RUN apt-get update -y && \
    apt-get install -y sqlite3 libsqlite3-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_sqlite

WORKDIR /app
COPY --from=build /app /app

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
