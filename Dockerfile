FROM richarvey/nginx-php-fpm

ADD ./current/ /var/www/html
COPY ./shared/.env /var/www/html/.env

RUN composer install --no-dev

RUN docker-php-ext-install -j1 mysqli
