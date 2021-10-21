FROM php:7.4-apache

LABEL maintainer="Krut Mayilvahanan"

RUN docker-php-ext-install pdo_mysql

#Apache Configuration 
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

#Copy our public folder to the working directory
COPY app /srv/app

#Set the working directory
WORKDIR /srv/app

#PHP config
COPY docker/php/php.ini /usr/local/etc/php/php.ini





