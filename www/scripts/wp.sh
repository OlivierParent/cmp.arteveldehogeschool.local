#!/usr/bin/env bash

`dirname $0`/db_reset.sh
`dirname $0`/wp_download.sh
`dirname $0`/wp_config.sh
`dirname $0`/wp_install.sh