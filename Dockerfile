FROM richarvey/nginx-php-fpm

ADD . /var/www/html

RUN docker-php-ext-install -j1 mysqli
