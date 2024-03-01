FROM php:8.3-apache

RUN apt-get update && \
    apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod ssl && a2enmod rewrite
RUN mkdir -p /etc/apache2/ssl
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf


EXPOSE 80
EXPOSE 443