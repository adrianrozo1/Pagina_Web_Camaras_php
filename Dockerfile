FROM php:8.2-apache

# 🔴 INSTALAR EXTENSIONES MYSQL PARA PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# (Opcional) URLs amigables
RUN a2enmod rewrite

# Copiar el proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
