FROM composer:2.9.5 AS builder

WORKDIR /app

COPY composer.json /app
COPY composer.lock /app

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts \
    --prefer-dist

FROM php:8.5-fpm-alpine

ARG UID=1000
ARG GID=1000

RUN addgroup -g ${GID} user && adduser -u ${UID} -G user -s /bin/sh -D user

WORKDIR /var/www/html

RUN apk add --no-cache nginx supervisor

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --chmod=755 ./docker/entrypoint.sh /entrypoint.sh
COPY ./docker/supervisor/supervisor.conf /etc/supervisor/conf.d/supervisor.conf
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/default.conf /etc/nginx/http.d/default.conf

COPY --from=builder --chown=${UID}:${GID} /app/vendor /var/www/html/vendor
COPY --chown=${UID}:${GID} . /var/www/html

RUN chown ${UID}:${GID} -R /var/www/html

RUN composer dump-autoload --optimize

ENTRYPOINT ["/entrypoint.sh"]
