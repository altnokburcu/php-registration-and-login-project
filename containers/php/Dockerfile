FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y
RUN apt-get install sudo unzip wget -y \
 &&  echo -e "\n opcache.enable=0 \n opcache.validate_timestamps=0 \n opcache.enable_cli=1 \n opcache.memory_consumption=128 \n opcache.interned_strings_buffer=8 \n opcache.max_accelerated_files=4000 \n opcache.revalidate_freq=0 \n opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini \
    &&  echo -e "\n xdebug.remote_enable=1 \n xdebug.remote_host=localhost \n xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    &&  echo -e "\n xhprof.output_dir='/var/tmp/xhprof'" >> /usr/local/etc/php/conf.d/docker-php-ext-xhprof.ini \
    &&  echo -e "\n max_input_vars = 10000" >> /usr/local/etc/php/conf.d/custom.ini \
    &&  echo -e "\n memory_limit = 128M" >> /usr/local/etc/php/conf.d/custom.ini \
    &&  echo -e "\n max_execution_time = 3600" >> /usr/local/etc/php/conf.d/custom.ini \
    &&  echo -e "\n post_max_size = 1G" >> /usr/local/etc/php/conf.d/custom.ini \
    &&  echo -e "\n upload_max_filesize = 1G" >> /usr/local/etc/php/conf.d/custom.ini \
    &&  echo -e "\n extension=sockets" >> /usr/local/etc/php/conf.d/custom.ini \
# Install composer
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "copy('https://composer.github.io/installer.sig', 'signature');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === trim(file_get_contents('signature'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN a2enmod rewrite
RUN a2enmod ssl
RUN service apache2 restart

EXPOSE 80