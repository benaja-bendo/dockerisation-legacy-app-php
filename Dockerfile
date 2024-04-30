FROM php:5-apache
COPY www/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/uploads
RUN chmod 777 /var/www/html/uploads
RUN docker-php-ext-install mysqli pdo_mysql
EXPOSE 80