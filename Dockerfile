# Gunakan base image resmi dengan PHP 8.2 + FPM
FROM php:8.2-fpm

# Install dependencies sistem
RUN apt-get update -y && \
    apt-get install -y --no-install-recommends \
        software-properties-common \
        gnupg2 \
        wget \
        curl \
        unzip \
        git \
        zip \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        libcurl4-openssl-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql mbstring zip gd curl xml && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Install PHP dari sury.org (opsional jika butuh extensi tambahan)
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list && \
    wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add - && \
    apt-get update -y

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Salin file Laravel ke container
COPY . .

# Install dependency Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader && \
    php artisan key:generate

# Jalankan PHP-FPM sebagai default
CMD ["bash" , "./run.sh"]
