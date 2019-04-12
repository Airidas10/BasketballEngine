#! /usr/bin/env bash


sudo apt-get update
sudo apt-get dist-upgrade -y
sudo apt-get autoremove -y

sudo apt-get install -y mariadb-server


# create initial database
mysql -uroot -phello -e "CREATE DATABASE homestead;"

mysql -uroot -phello -e "\
  CREATE USER 'homestead'@'localhost' IDENTIFIED BY 'secret';\
  GRANT USAGE ON *.* TO 'homestead'@'localhost' IDENTIFIED BY 'secret' \
  WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; \
  GRANT ALL PRIVILEGES ON homestead.* TO 'homestead'@'localhost'; \
"


