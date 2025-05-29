FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    curl \
    && rm -rf /var/lib/apt/lists/*

COPY proxy.php /var/www/html/
WORKDIR /var/www/html

CMD ["php", "-S", "0.0.0.0:10000", "proxy.php"]