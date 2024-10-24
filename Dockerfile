# Dockerfile

# Stage 1: Build PHP app
FROM php:8.0-fpm AS php-build
WORKDIR /var/www/html
COPY . /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Stage 2: Nginx + PHP-FPM
FROM nginx:alpine
COPY --from=php-build /var/www/html /var/www/html
COPY ./nginx.conf /etc/nginx/nginx.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
