alias console="php /vagrant/bin/console"
alias php-cs-fixer="/home/{{ ansible_user }}/vendor/bin/php-cs-fixer fix"
alias phpunit="/home/{{ ansible_user }}/vendor/bin/phpunit -c /vagrant/"
alias phpunit-coverage="php -dzend_extension=xdebug.so /home/{{ ansible_user }}/vendor/bin/phpunit --coverage-html /vagrant/coverage -c /vagrant/app"
