FROM php:7.2.1-apache

ENV DEBIAN_FRONTEND=noninteractive

# Install the PHP extensions I need for my personal project (gd, mbstring, opcache)

RUN apt-get update && apt-get install -y git mysql-client wget \
	&& docker-php-ext-install mbstring
RUN apt-get update && apt-get install -y apt-utils 
#RUN sudo apt-get install -y nfs-common

# Install mysql extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN a2enmod rewrite
# RUN a2enmod expires
# RUN a2enmod mime
# RUN a2enmod filter
# RUN a2enmod deflate
# RUN a2enmod proxy_http
# RUN a2enmod headers
RUN a2enmod php7

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin

# Clean after install
RUN apt-get autoremove -y && apt-get clean all

# Configuration for Apache
RUN rm -rf /etc/apache2/sites-enabled/000-default.conf
ADD apache/000-default.conf /etc/apache2/sites-available/
RUN ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/
RUN a2enmod rewrite

EXPOSE 80

# Change website folder rights and upload your website
RUN chown -R www-data:www-data /var/www/html
ADD ./website /var/www/html

# Change working directory
WORKDIR /var/www/html

# Install and update laravel (rebuild into vendor folder)
RUN composer install

# Laravel writing rights
RUN chgrp -R www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

# Change your local 
RUN echo "locales locales/default_environment_locale select en.UTF-8" | debconf-set-selections \
&& echo "locales locales/locales_to_be_generated multiselect 'en.UTF-8 UTF-8'" | debconf-set-selections
RUN echo "America/Los_Angeles" > /etc/timezone && dpkg-reconfigure -f noninteractive tzdata

# Create Laravel folders (mandatory)
RUN mkdir -p /var/www/html/storage/framework
RUN mkdir -p /var/www/html/storage/framework/sessions
RUN mkdir -p /var/www/html/storage/framework/views
RUN mkdir -p /var/www/html/storage/meta
RUN mkdir -p /var/www/html/storage/cache
RUN mkdir -p /var/www/html/public/uploads

# Change folder permission
RUN chmod -R 0777 /var/www/html/storage/
RUN chmod -R 0777 /var/www/html/public/uploads/

# Mount EFS
RUN mount -t nfs4 -o nfsvers=4.1,rsize=1048576,wsize=1048576,hard,timeo=600,retrans=2 fs-b40f9e1d.efs.us-west-2.amazonaws.com:/ /var/www/html/public/uploads

RUN php artisan migrate

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
