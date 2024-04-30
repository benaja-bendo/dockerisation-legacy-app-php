FROM php:8.3.7RC1-apache
COPY www/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/uploads
RUN chmod 777 /var/www/html/uploads
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql
EXPOSE 80