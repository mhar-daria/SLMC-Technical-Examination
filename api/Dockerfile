FROM php:7.4-fpm

USER root

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql -j$(nproc) gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

WORKDIR /var/www/api

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www/api

COPY --chown=www:www . /var/www/api

# RUN composer install

USER www

EXPOSE 9000
CMD ["php-fpm"]
