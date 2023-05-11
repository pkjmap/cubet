FROM php:8.2-fpm

RUN apt-get update

RUN apt-get install -y libzip-dev git procps unzip

RUN docker-php-ext-install -j$(nproc) zip

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd exif

RUN curl -o /tmp/security_checker -L "https://github.com/fabpot/local-php-security-checker/releases/download/v1.0.0/local-php-security-checker_1.0.0_linux_amd64" \
    && mv /tmp/security_checker /usr/bin/local-php-security-checker \
    && chmod +x /usr/bin/local-php-security-checker

# Install composer from docker repo
COPY --from=composer:2.2.12 /usr/bin/composer /usr/local/bin/composer
RUN set -eux \
   && apt-get update \
   && apt-get install -y libzip-dev zlib1g-dev \
   && docker-php-ext-install zip
RUN docker-php-ext-enable gd exif

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

WORKDIR /app

ADD docker/php/php.ini $PHP_INI_DIR/conf.d/
ADD docker/php/xdebug.ini  $PHP_INI_DIR/conf.d/

COPY . /app/

#RUN composer install

RUN chmod 777 /app/storage -R

EXPOSE 9000

# Likely don't need to force this to the foreground.  If it fails add `-F` option
CMD ["php-fpm"]
