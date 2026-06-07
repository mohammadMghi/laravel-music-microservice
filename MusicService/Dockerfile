FROM php:8.4-fpm

WORKDIR /var/www/html

# Force https for apt sources
RUN find /etc/apt/ -name "*.list" -o -name "*.sources" \
    -exec sed -i 's|http://|https://|g' {} +

RUN apt-get update && apt-get install -y \
    ca-certificates \
    apt-transport-https

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install fileinfo \
    && docker-php-ext-install sockets \
    \
    # Install Redis extension from GitHub
    && mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/refs/tags/6.2.0.tar.gz \
       | tar -xz --strip-components=1 -C /usr/src/php/ext/redis \
    && docker-php-ext-install redis \
    \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy project
COPY . .

# Fix Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache
  
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
