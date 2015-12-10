#!/usr/bin/env bash

source `dirname $0`/settings
cd `dirname $0`/..
wp core download --path=${WP_PATH} --locale=${WP_LOCALE}