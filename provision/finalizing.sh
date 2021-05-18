#!/bin/bash

echo '--- Finalizing ---'

composer global require hirak/prestissimo

sudo service mysql restart
sudo service php${VM_PHP_VERSION}-fpm restart
sudo service nginx restart