#!/usr/bin/env bash
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927
sudo add-apt-repository -y ppa:nginx/stable
sudo apt-get update

# Install nginx
sudo apt-get install -y nginx

# Install postgres
sudo apt-get install -y postgresql postgresql-contrib
#php7.1

sudo apt-get install -y  php-imagick php-zip php-fpm php-pgsql php-json php-gd php-curl php-memcached php-dev php-mcrypt php-mbstring  php php-xml

sudo cp /vagrant/sites-available /etc/nginx/sites-available/default
sudo service nginx restart

#pacakage manager
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
