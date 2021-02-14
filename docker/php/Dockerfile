FROM php:7.4-fpm
ARG ENV
RUN apt update && \
    apt upgrade -y && \
    apt install -y \
        zlib1g-dev \
        zip \
        unzip \
        mariadb-client \
        busybox-static \
    && pecl install xdebug \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql opcache \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer
