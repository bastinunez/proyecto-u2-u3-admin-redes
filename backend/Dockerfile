# Utiliza una imagen base de PHP sin Apache
FROM php:8.2

# Instala dependencias de Laravel
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
    && docker-php-ext-install zip pdo_mysql


# Configura el directorio de trabajo
WORKDIR /var/www/html

ENV APP_ENV=local
ENV APP_DEBUG=true

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el contenido de tu aplicación Laravel al contenedor
COPY . /var/www/html

# Instala las dependencias de Laravel
RUN composer install

# Establece los permisos adecuados
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Exponer cualquier puerto necesario para Laravel (por ejemplo, el puerto 3000)
EXPOSE 3000


#RUN apt-get install php-curl php-gd php-gmp php-imap php-mysqli php-pdo-mysql
#RUN php artisan db:seed && php artisan migrate --seed
#RUN php artisan migrate --seed

# Configura la ejecución del servidor web desde el contenedor de Apache externo
#CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=3000"]
CMD ["/usr/local/bin/entrypoint.sh"]

