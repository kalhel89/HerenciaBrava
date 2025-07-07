# Imagen base con PHP, Composer y extensiones necesarias
FROM php:8.2-fpm

# Instalar utilidades y Node.js (para Vite)
RUN apt-get update -y && \
    apt-get install -y git curl unzip zip nano libpng-dev libonig-dev libxml2-dev libzip-dev && \
    docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Node.js (usamos Node 18 LTS por compatibilidad)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /app

# Copiar archivos de Composer y hacer instalación optimizada
COPY composer.* ./
RUN composer install --no-dev --prefer-dist --no-scripts

# Copiar el resto del código fuente
COPY . .

# Preparar dependencias de Vite y compilar sin errores de Rollup
RUN rm -rf node_modules package-lock.json && \
    npm install --legacy-peer-deps && \
    npm rebuild && \
    npm run build
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache
# Puerto expuesto por Laravel
EXPOSE 8000

# Comando de arranque del contenedor
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
