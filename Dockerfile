FROM richarvey/nginx-php-fpm

ADD ./current/ /var/www/html
COPY ./shared/.env /var/www/html/.env

RUN composer install --production

RUN docker-php-ext-install -j1 mysqli
