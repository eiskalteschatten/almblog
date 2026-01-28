FROM php:8.5-apache

RUN apt-get update && \
    apt-get install -y && \
    docker-php-ext-install pdo_mysql

# RUN curl -sS https://getcomposer.org/installer | php && \
#     mv composer.phar /usr/local/bin/composer && \
#     chmod +x /usr/local/bin/composer

RUN a2enmod rewrite alias

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html/
WORKDIR /var/www/html/

# RUN composer install

RUN chown -R www-data:www-data /var/www/html/ && \
    chmod -R 755 /var/www/html/

EXPOSE 80

CMD ["apache2-foreground"]
