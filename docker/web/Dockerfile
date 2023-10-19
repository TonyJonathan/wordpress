FROM php:apache-bullseye 

RUN docker-php-ext-install mysqli

RUN docker-php-ext-enable mysqli

RUN a2enmod rewrite

RUN chown -R www-data:root /var/www/html \
    && chmod -R 775 /var/