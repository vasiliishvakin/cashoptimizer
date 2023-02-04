FROM php:8.2.2RC1-fpm-buster

RUN apt-get update && apt-get -y dist-upgrade

RUN ln -snf /usr/share/zoneinfo/UTC /etc/localtime && echo UTC > /etc/timezone

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apt-get update && apt-get -y install git mc ssh wget curl

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd pdo_mysql redis apcu imagick yaml igbinary mbstring xml bcmath gmp decimal bz2 curl intl opcache xsl zip xdebug msgpack

RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=develop,coverage,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

#RUN curl -fsSL https://deb.nodesource.com/setup_19.x | bash - &&\
#    apt-get install -y nodejs

RUN rm -rf /var/lib/apt/lists/*
