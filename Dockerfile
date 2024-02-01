# Sử dụng hình ảnh PHP chính thức từ Docker Hub
FROM php:7.4-apache

# Cài đặt các extension PHP cần thiết
RUN docker-php-ext-install pdo pdo_mysql

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Sao chép các tệp từ dự án Laravel vào container
COPY . .


