FROM php:8.0-fpm-alpine

WORKDIR /var/www

RUN apk update && apk add \
  build-base \
  vim

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli

RUN apk add --no-cache --update --virtual buildDeps autoconf \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del buildDeps

EXPOSE 9000