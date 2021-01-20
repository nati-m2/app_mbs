FROM php:7.4-apache
RUN docker-php-ext-install mysqli
RUN chown -R 33 /var/www/html/
RUN cp  /var/www/html/config/php.ini  /usr/local/etc/php/php.ini

