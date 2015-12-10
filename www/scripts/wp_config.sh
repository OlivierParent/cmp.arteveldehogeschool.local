#!/usr/bin/env bash

source `dirname $0`/settings
cd `dirname $0`/../${WP_PATH}
wp core config --dbname=${DB_NAME} --dbuser=${DB_USER} --dbpass=${DB_PASS} --dbhost=${DB_HOST} --dbprefix=${DB_PREFIX}