# Usa una imagen base de PHP con FPM
FROM php:8.1-fpm

# Instala las dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala Node.js y npm (si necesitas assets con Laravel Mix)
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copia solo los archivos composer.json y composer.lock para instalar dependencias
COPY composer.json composer.lock ./

# Instala las dependencias de PHP usando Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copia el resto de los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Node.js (si usas Laravel Mix)
RUN npm install

# Compila los assets de Laravel Mix
RUN npm run dev

# Ejecuta las migraciones de la base de datos
RUN php artisan migrate --force

# Optimiza la aplicación de Laravel
RUN php artisan optimize

# Da permisos a las carpetas necesarias para Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expone el puerto en el que Laravel se ejecutará
EXPOSE 8000

# Comando para iniciar el servidor de Laravel con PHP-FPM
CMD ["php-fpm"]
