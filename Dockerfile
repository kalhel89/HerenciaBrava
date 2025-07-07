# ---------- 1) Imagen base con PHP, Composer y extensiones ----------
FROM composer:2.7 as build

# Instala Node (para Vite) y dependencias del sistema
RUN apt-get update -y && \
    apt-get install -y git curl unzip nano && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Crea directorio de trabajo
WORKDIR /app

# Copia solo composer.json y composer.lock primero (cache)
COPY composer.* ./

# ---------- 2) Instala dependencias PHP ----------
RUN composer install --no-dev --prefer-dist --no-scripts

# ---------- 3) Copia todo el proyecto ----------
COPY . .

# ---------- 4) Instala dependencias JS y compila Vite ----------
RUN npm install && npm run build

# ---------- 5) Genera la APP_KEY ----------
RUN php artisan key:generate --force

# ---------- 6) Imagen final slim ----------
FROM php:8.3-cli

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite

WORKDIR /app
COPY --from=build /app /app

# Puerto que usará Render ($PORT)
EXPOSE 8080

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
