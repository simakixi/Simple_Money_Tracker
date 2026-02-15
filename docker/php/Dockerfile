FROM php:8.2-apache

# 必要な拡張機能をインストール
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Apache mod_rewriteを有効化
RUN a2enmod rewrite

# DocumentRootを設定
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 作業ディレクトリを設定
WORKDIR /var/www/html

# PHP設定
RUN echo "display_errors = On" >> /usr/local/etc/php/php.ini-development && \
    echo "error_reporting = E_ALL" >> /usr/local/etc/php/php.ini-development && \
    cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
