FROM php:apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql
