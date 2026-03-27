#!/bin/sh

su user -c "composer dump-autoload --optimize"
su user -c "php artisan optimize:clear"

if [ "${APP_ENV}" == "production" ]; then
    su user -c "php artisan optimize"
    su user -c "php artisan migrate --force"
fi

supervisord -c /etc/supervisor/conf.d/supervisor.conf
