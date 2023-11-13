FROM php:apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y