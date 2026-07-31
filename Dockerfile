FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["/bin/bash", "-c", "sed -i \"s/80/${PORT:-80}/g\" /etc/apache2/sites-enabled/000-default.conf /etc/apache2/ports.conf && apache2-foreground"]
