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

# Enable the php extensions.
#Install ODBC Driver
# Se comenta el 3 de mayo
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update

# Install sqlsrv
# Se comenta el 3 de mayo
RUN apt-get update
RUN apt-get install -y wget
RUN wget http://ftp.br.debian.org/debian/pool/main/g/glibc/multiarch-support_2.24-11+deb9u4_amd64.deb && \
    dpkg -i multiarch-support_2.24-11+deb9u4_amd64.deb
RUN ACCEPT_EULA=Y apt-get -y install msodbcsql17 unixodbc-dev
RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable pdo_sqlsrv sqlsrv

RUN pecl install pdo_sqlsrv-5.6.1 sqlsrv-5.6.1 \
    && docker-php-ext-enable pdo_sqlsrv sqlsrv

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
# RUN sed -i -E 's/(CipherString\s*=\s*DEFAULT@SECLEVEL=)2/\11/' /etc/ssl/openssl.cnf
EXPOSE 80

VOLUME ["/var/www/html", "/var/log/apache2", "/etc/apache2"]


