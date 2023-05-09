FROM debian:10
LABEL username=atlas 
LABEL email=web.dev89@yandex.by

RUN apt update && apt -y upgrade \
    && apt -y install wget

# Установка php8 на Debian
RUN apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" |  tee /etc/apt/sources.list.d/sury-php.list
RUN wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -
RUN apt -y update && apt -y install php8.2  git curl
# Установка php-fpm
RUN apt install -y php-fpm
# Расширения php
RUN apt -y install php-common php-mysql php-curl php-mbstring php-bcmath php-gmp php-zip php-xml php-gd php-imagick php-intl php-ldap php-sqlite3 php-tidy
# Сам папку не создает приходиться в ручную
RUN mkdir -p /run/php/

#Установка xdebug
RUN apt install -y php-xdebug
RUN phpenmod xdebug

WORKDIR /usr/src/app

COPY start.sh /usr/local/bin/start.sh
CMD /usr/local/bin/start.sh

