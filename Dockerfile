from wordpress:latest

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar

RUN php wp-cli.phar --info

RUN chmod +x wp-cli.phar

RUN mv wp-cli.phar /usr/local/bin/wp

RUN apt-get update && apt-get install -y \
    subversion \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*
