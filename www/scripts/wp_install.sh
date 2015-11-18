#!/usr/bin/env bash

source `dirname $0`/settings
`dirname $0`/db_reset.sh
cd `dirname $0`/..
wp core download --path=${WP_PATH} --locale=${WP_LOCALE}
cd ${WP_PATH}
wp core config --dbname=${DB_NAME} --dbuser=${DB_USER} --dbpass=${DB_PASS} --dbhost=${DB_HOST} --dbprefix=${DB_PREFIX}
wp core install --url=${WP_URL} --title='${COURSE}' --admin_user=${WP_USER} --admin_password=${WP_PASS} --admin_email=${WP_MAIL}
