FROM php:7.4-apache

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif ftp
RUN docker-php-ext-install intl
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pdo
RUN docker-php-ext-enable pdo_mysql
RUN apt-get -y install --fix-missing zip unzip
RUN apt-get -y install --fix-missing git

#ADD apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# LDAP INSTALLATION
RUN set -x \
    && apt-get update \
&& apt-get install -y libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install ldap \
    && apt-get purge -y --auto-remove libldap2-dev

RUN apt-get update && apt-get install -y apt-transport-https

# adding custom MS repository

RUN apt-get update && apt-get install -y locales unixodbc libgss3 odbcinst \
    devscripts debhelper dh-exec dh-autoreconf libreadline-dev libltdl-dev \
    tdsodbc unixodbc-dev wget unzip apt-transport-https \
    libfreetype6-dev libmcrypt-dev libjpeg-dev libpng-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen

RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
    apt-transport-https

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

RUN docker-php-ext-install calendar && docker-php-ext-configure calendar
RUN docker-php-ext-install gd

RUN cd /var/www/html
# Copy composer.lock and composer.json
COPY composer.json /var/www/html/
# Set working directory
WORKDIR /var/www/html
# Copy existing application directory contents
COPY . /var/www/html
# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data /var/www/html
# Install dependencies
RUN composer install
RUN composer dump-autoload
EXPOSE 80

VOLUME ["/var/www/html", "/var/log/apache2", "/etc/apache2"]


