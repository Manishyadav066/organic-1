FROM php:8.2-apache

# Install required PHP extensions for MySQL database connection
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files to Apache's web root
COPY . /var/www/html/

# Update permissions
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80 for Render to route traffic
EXPOSE 80
