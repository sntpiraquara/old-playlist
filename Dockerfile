FROM richarvey/nginx-php-fpm

ADD ./current /var/www/html
ADD ./shared/.env /var/www/html

RUN docker-php-ext-install -j1 mysqli
