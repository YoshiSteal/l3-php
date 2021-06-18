FROM debian:buster-slim

RUN apt-get update \
&&  apt-get install -y --no-install-recommends \
software-properties-common \
apt-transport-https \
lsb-release \
ca-certificates \
&&  apt-get update \
&&  apt-get install -y --no-install-recommends \
gnupg \
gnupg1 \
gnupg2 \
ssl-cert \
git \
wget \
curl \
acl \
unzip

RUN rm -rf /etc/apt/sources.list.d/*

RUN apt-get update \
&&  curl -sL https://deb.nodesource.com/setup_12.x | bash - \
&&  curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
&&  wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add - \
&&  echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
&&  echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

RUN apt-get update \
&&  DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
nodejs \
yarn \
apache2 \
libapache2-mod-php7.3 \
php7.3 \
php7.3-cli \
php7.3-common \
php7.3-curl \
php7.3-mbstring \
php7.3-mysql \
php7.3-xml \
php7.3-gd \
php7.3-intl \
php7.3-zip

COPY docker /

RUN a2dissite default-ssl.conf \
&&  a2enmod rewrite \
&&  a2enmod headers

RUN rm -rf /var/www/html/*

RUN chmod +x -R /usr/bin

COPY --chown=www-data:www-data . /var/www/html

EXPOSE 80

WORKDIR /var/www/html

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["apache2-foreground.sh"]