# Use the official PHP image as base
FROM php:8.1-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy application source code to the Apache document root
COPY src/ /var/www/html/

# Set permissions for the Apache document root
RUN chown -R www-data:www-data /var/www/html
