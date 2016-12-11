#!/bin/sh

cp files/parameters.yml ../app/config/

docker exec sonata composer install --optimize-autoloader
docker exec sonata php app/console doctrine:migrations:migrate --no-interaction
docker exec sonata chown -R www-data:www-data /var/www/html
