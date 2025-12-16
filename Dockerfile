# Usar la imagen base de PHP con Apache
FROM php:8.2-apache

# Copiar todo el contenido del proyecto en el contenedor
COPY . /var/www/html/

# Configurar permisos para los archivos
RUN chown -R www-data:www-data /var/www/html

# Habilitar el módulo de reescritura de Apache (si es necesario)
RUN a2enmod rewrite

# Exponer el puerto 80 para acceso a la web
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
