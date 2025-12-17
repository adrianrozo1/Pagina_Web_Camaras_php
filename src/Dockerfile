FROM php:8.2-apache

# Instalar extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar TODO tu proyecto (tal como está)
COPY . /var/www/html/

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html
