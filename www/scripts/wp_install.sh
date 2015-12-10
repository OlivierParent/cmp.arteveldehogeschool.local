#!/usr/bin/env bash

source `dirname $0`/settings
cd `dirname $0`/../${WP_PATH}
wp core install --url=${WP_URL} --title="${COURSE}" --admin_user=${WP_USER} --admin_password=${WP_PASS} --admin_email=${WP_MAIL}