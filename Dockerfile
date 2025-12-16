FROM nginx:alpine

# Limpiar archivos por defecto
RUN rm -rf /usr/share/nginx/html/*

# Copiar todo el proyecto
COPY . /usr/share/nginx/html

# Exponer puerto 80
EXPOSE 80

# Iniciar Nginx
CMD ["nginx", "-g", "daemon off;"]
