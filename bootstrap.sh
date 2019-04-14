#! /usr/bin/env bash

# update system
sudo apt-get update
sudo apt-get dist-upgrade -y
sudo apt-get autoremove -y

#install, configure and enable firewall
sudo apt-get install ufw
sudo ufw allow http
sudo ufw allow https
sudo ufw allow ssh
sudo ufw enable

# install useful tools
sudo apt-get install -y emacs
sudo apt-get install -y git
sudo apt-get install -y apg
sudo apt-get install -y zip

debconf-set-selections <<< "postfix postfix/mailname string $HOSTNAME"
debconf-set-selections <<< "postfix postfix/main_mailer_type string 'Internet Site'"
sudo apt-get install -y mailutils
sudo cp /bootstrap_files/composer /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# install webserver, php and database
sudo apt-get install -y nginx-full
sudo apt-get install -y php7.2 php7.2-cli php7.2-curl php7.2-mbstring php7.2-xml php7.2-gd php7.2-mysql php7.2-fpm php7.2-bcmath
echo "mariadb-server-10.0  mysql-server/root_password_again password hello" | debconf-set-selections
echo "mariadb-server-10.0  mysql-server/root_password password hello" | debconf-set-selections
sudo apt-get install -y mariadb-server

# setup project nginx
echo "* Configuring Nginx and php7.2-fpm"
if ! [ -d /etc/nginx/global ] ; then
    sudo cp -R /bootstrap_files/global /etc/nginx/
fi

sudo cp /bootstrap_files/nginx.basketball.wip.conf /etc/nginx/sites-available/basketball.wip.conf
if ! [ -L /etc/nginx/sites-enabled/basketball.wip.conf ] ; then
    sudo ln -s /etc/nginx/sites-available/basketball.wip.conf /etc/nginx/sites-enabled/basketball.wip.conf
fi
sudo cp /bootstrap_files/index.html /usr/share/nginx/html/index.php
# setup project php7.2-fpm pool                  
sudo cp /bootstrap_files/php-fpm.basketball.wip.conf /etc/php/7.2/fpm/pool.d/basketball.wip.conf

sudo sed -i 's/sendfile on/sendfile off/' /etc/nginx/nginx.conf

# check and create missing directories
if ! [ -d /srv/www/logs ] ; then
  sudo mkdir -p /srv/www/logs
fi

if ! [ -L /srv/www/basketball.wip ] ; then
  sudo rm -rf /srv/www/basketball.wip
  sudo ln -s /vagrant /srv/www/basketball.wip
fi


# Setup laravel project
echo "* Installing laravel dependencies"

if ! [ -e /vagrant/basketball/.env ] ; then
    sudo cp /bootstrap_files/.env /vagrant/basketball/.env
fi

cd /vagrant/basketball

if ! [ -d /home/vagrant/.composer ] ; then
  sudo -u vagrant mkdir /home/vagrant/.composer
fi

sudo composer self-update

sudo -u vagrant composer install

# create initial database
printf "* Adding mysql user: ${username}\n"
mysql -uroot -phello -e "CREATE DATABASE homestead;"

mysql -uroot -phello -e "\
  CREATE USER 'homestead'@'localhost' IDENTIFIED BY 'secret';\
  GRANT USAGE ON *.* TO 'homestead'@'localhost' IDENTIFIED BY 'secret' \
  WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; \
  GRANT ALL PRIVILEGES ON homestead.* TO 'homestead'@'localhost'; \
"
echo "* migrating database"
sudo php artisan migrate

# restart nginx and php to pull in project config files
sudo service nginx reload
sudo service php7.2-fpm restart
