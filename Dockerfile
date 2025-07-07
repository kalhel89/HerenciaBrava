FROM php:8.3-cli AS build
RUN apt-get update -y && \
    apt-get install -y git curl unzip nano && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY composer.* ./
RUN composer install --no-dev --prefer-dist --no-scripts
COPY . .

# Dependencias JS + build Vite
RUN npm install --legacy-peer-deps
RUN npm run build
