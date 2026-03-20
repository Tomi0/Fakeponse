#!/bin/sh

echo "Hola mundo"

ls -lrta /var/www

supervisord -c /etc/supervisor/conf.d/supervisor.conf
