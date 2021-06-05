FROM php:7.4.19-fpm

RUN pecl install xdebug-3.0.4 \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        #wget \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY ./composer.phar /usr/local/bin/composer
RUN apt-get update && apt-get install -y git \
    && chmod 755 /usr/local/bin/composer

RUN curl-fsSL https://deb.nodesource.com/setup_16.x | bash-\
	  &&apt-get install-y nodejs

#RUN wget https://phar.phpunit.de/phpunit.phar \
#    && chmod +x phpunit.phar \
#    && mv phpunit.phar /usr/local/bin/phpunit

#RUN apt-get install -y software-properties-common
#RUN add-apt-repository ppa:ondrej/php
#RUN apt-get update
#RUN apt install -y php8.0-common \
#		php8.0-mysql \
#		php8.0-xml \
#		php8.0-curl \
#		php8.0-gd \
#		php8.0-imagick \
#		php8.0-cli \
#		php8.0-dev \
#		php8.0-imap \
#		php8.0-mbstring \
#		php8.0-opcache \
#		php8.0-soap \
#		php8.0-zip

