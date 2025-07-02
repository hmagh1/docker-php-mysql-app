FROM php:8.1-apache

RUN apt-get update && apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

COPY apache.conf /etc/apache2/sites-available/000-default.conf
COPY wait-for-mysql.sh /usr/local/bin/wait-for-mysql.sh
RUN chmod +x /usr/local/bin/wait-for-mysql.sh

CMD ["wait-for-mysql.sh"]
