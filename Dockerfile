FROM php:8.3-apache
#https://hub.docker.com/_/php in php:<version>-apache
#Change Document Root to html -> public (which will exist when framework is installed) 
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# needed for 
RUN a2enmod rewrite

# https://github.com/mlocati/docker-php-extension-installer#special-requirements
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions zip mysqli pdo_mysql intl @composer

# -m -> create home
# -s -> shell acess
RUN useradd -ms /bin/bash app

USER app

WORKDIR /var/www/html

EXPOSE 80

# docker build -t php-8.3 .

# docker run --name symfony-live-components -d -v $(pwd)/:/var/www/html -p 80:80 php-8.3