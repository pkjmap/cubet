#!/usr/bin/env bash

set -ueo pipefail

envsubst '$NGINX_PHP_UPSTREAM $NGINX_URI_PREFIX' < /etc/nginx/conf.d/default.conf.tmpl > /etc/nginx/conf.d/default.conf

exec nginx
