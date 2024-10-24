# Use the official PHP image with Apache
FROM php:8.1-apache

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80
