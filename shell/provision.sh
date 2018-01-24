#!/bin/bash
sudo apt-get update
sudo apt-get upgrade

sudo apt-get install -y nginx

sudo apt-get install -y php5-fpm php5-cli php5-intl php5-mysqlnd php5-memcached php5 php5-curl

curl -sS https://getcomposer.org/installer | php

#sudo apt-get install -y memcached
#copy template config from /shell into /sites-available with symlink to /sites-enabled
sudo cp /vagrant/shell/test.conf /etc/nginx/sites-available/test.loc.conf
sudo ln -s /etc/nginx/sites-available/test.loc.conf /etc/nginx/sites-enabled/test.loc.conf

sudo service nginx restart
sudo service php5-fpm restart

##installing MySQL with filling and repeating password 'root' for root user
#sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
#sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
#sudo apt-get install -y mysql-client mysql-server
#
##creating UTF-8 database 'db_name'
#mysql -uroot -proot -e "CREATE DATABASE IF NOT EXISTS db_name CHARACTER SET utf8 COLLATE utf8_general_ci;"
#
#sudo service mysql restart