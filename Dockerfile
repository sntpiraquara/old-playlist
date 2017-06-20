FROM richarvey/nginx-php-fpm

ADD . /code

ADD nginx.conf /etc/nginx/sites-enabled/

EXPOSE 80
