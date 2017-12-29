#!/bin/bash

if [[ -z "$SERVICE_NAME" ]]; then
    SERVICE_NAME="html"
fi

# Enable custom nginx config files if they exist
if [ -f /var/www/$SERVICE_NAME/nginx-site.conf ]; then
    cp /var/www/$SERVICE_NAME/nginx-site.conf /etc/nginx/sites-available/default.conf
fi

# Set custom webroot
if [ ! -z "$WEBROOT" ]; then
    sed -i "s#root /var/www/html;#root ${WEBROOT};#g" /etc/nginx/sites-available/default.conf
fi

# Display PHP error's or not
if [[ "$ERRORS" != "1" ]] ; then
    echo php_flag[display_errors] = off >> /usr/local/etc/php-fpm.conf
else
    echo php_flag[display_errors] = on >> /usr/local/etc/php-fpm.conf
fi

# Display Version Details or not
if [[ "$HIDE_NGINX_HEADERS" == "0" ]] ; then
    sed -i "s/server_tokens off;/server_tokens on;/g" /etc/nginx/nginx.conf
else
    sed -i "s/expose_php = On/expose_php = Off/g" /usr/local/etc/php-fpm.conf
fi

# Pass real-ip to logs when behind ELB, etc
if [[ "$REAL_IP_HEADER" == "1" ]] ; then
    sed -i "s/#real_ip_header X-Forwarded-For;/real_ip_header X-Forwarded-For;/" /etc/nginx/sites-available/default.conf
    sed -i "s/#set_real_ip_from/set_real_ip_from/" /etc/nginx/sites-available/default.conf
    if [ ! -z "$REAL_IP_FROM" ]; then
        sed -i "s#172.16.0.0/12#$REAL_IP_FROM#" /etc/nginx/sites-available/default.conf
    fi
fi

# Increase the memory_limit
if [ ! -z "$PHP_MEM_LIMIT" ]; then
    sed -i "s/memory_limit = 128M/memory_limit = ${PHP_MEM_LIMIT}M/g" /usr/local/etc/php/conf.d/docker-vars.ini
fi

# Increase the post_max_size
if [ ! -z "$PHP_POST_MAX_SIZE" ]; then
    sed -i "s/post_max_size = 100M/post_max_size = ${PHP_POST_MAX_SIZE}M/g" /usr/local/etc/php/conf.d/docker-vars.ini
fi

# Increase the upload_max_filesize
if [ ! -z "$PHP_UPLOAD_MAX_FILESIZE" ]; then
    sed -i "s/upload_max_filesize = 100M/upload_max_filesize= ${PHP_UPLOAD_MAX_FILESIZE}M/g" /usr/local/etc/php/conf.d/docker-vars.ini
fi

if [ ! -z "$PUID" ]; then
    if [ -z "$PGID" ]; then
        PGID=${PUID}
    fi
    deluser nginx
    addgroup -g ${PGID} nginx
    adduser -D -S -h /var/cache/nginx -s /sbin/nologin -G nginx -u ${PUID} nginx
else
    # Always chown webroot for better mounting
    chown -Rf nginx.nginx /var/www/$SERVICE_NAME
fi

# Run custom scripts
if [[ "$RUN_SCRIPTS" == "1" ]] ; then
    if [ -d "/var/www/$SERVICE_NAME/scripts/" ]; then
        # make scripts executable incase they aren't
        chmod -Rf 750 /var/www/$SERVICE_NAME/scripts/*
        # run scripts in number order
        for j in `ls /var/www/$SERVICE_NAME/scripts/`; do /var/www/$SERVICE_NAME/scripts/$j ; done
    else
        echo "Can't find script directory"
    fi
fi

# Ensure enviroment file
if [[ ! -z "$ENV_FILE_NAME" ]]; then
    cp /var/www/$SERVICE_NAME/$ENV_FILE_NAME /var/www/$SERVICE_NAME/.env
fi

# Start supervisord and services
exec /usr/bin/supervisord -n -c /etc/supervisord.conf