FROM richarvey/nginx-php-fpm

ADD ./current/ /var/www/html
COPY ./shared/.env /var/www/html/.env

RUN docker-php-ext-install -j1 mysqli
