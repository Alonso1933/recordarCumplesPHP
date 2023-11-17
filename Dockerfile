# Utiliza la imagen oficial de PHP como base
FROM php:8.1.12-apache

# Copia los archivos de la aplicación al contenedor
COPY . /var/www/html/

# Instalar el controlador PDO para MySQL
RUN docker-php-ext-install pdo_mysql

# Puerto en el que escuchará Apache
EXPOSE 8080

# Configuración para evitar el mensaje de advertencia
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Comando para iniciar Apache en primer plano
CMD ["apache2-foreground"]