#!/usr/bin/env bash

set -eu -o pipefail

DB_HOST=localhost
MYSQL_ROOT_HOST=%

MYSQL_BASE_CMD="--user=root ${MYSQL_AUTH_COMMAND} --skip-networking --default-time-zone=SYSTEM"

echo "Initialize Mysql"
MYSQL_LOG=$(mysqld ${MYSQL_BASE_CMD} --initialize 2>&1)

echo "MYSQL_LOG : ${MYSQL_LOG}"
MYSQL_ROOT_PASSWORD_TMP=$(echo ${MYSQL_LOG} | awk '{print $NF}')

echo "MYSQL ROOT PASSWORD TEMP : ${MYSQL_ROOT_PASSWORD_TMP}"

echo "Start MYSQLD daemon"
mysqld ${MYSQL_BASE_CMD} --daemonize

echo "Loging into mysql"

SQL="ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '${MYSQL_ROOT_PASSWORD}';
		GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION ;
		FLUSH PRIVILEGES ;
		CREATE USER 'root'@'${MYSQL_ROOT_HOST}' IDENTIFIED WITH mysql_native_password BY '${MYSQL_ROOT_PASSWORD}' ;
			GRANT ALL ON *.* TO 'root'@'${MYSQL_ROOT_HOST}' WITH GRANT OPTION ;
		DROP DATABASE IF EXISTS test ;
        FLUSH PRIVILEGES ;"

echo "${SQL}" | mysql --connect-expired-password -uroot -hlocalhost -p${MYSQL_ROOT_PASSWORD_TMP};

#############################
echo "Starting Regular Stuff"
#############################

# QUBET DB
echo "QUBET DB INIT"
SQL="CREATE DATABASE IF NOT EXISTS \`${DB_DATABASE}\`;
CREATE USER IF NOT EXISTS '${DB_USERNAME}'@'%' IDENTIFIED WITH mysql_native_password BY '${DB_PASSWORD}';
GRANT SUPER  ON *.* TO '${DB_USERNAME}'@'%';
GRANT ALL PRIVILEGES ON \`${DB_DATABASE}\`.* TO '${DB_USERNAME}'@'%';
FLUSH PRIVILEGES;"
echo "${SQL}" | mysql -h ${DB_HOST} -u root -p${MYSQL_ROOT_PASSWORD}
# import qubet.sql
echo "Importing QUBET DB"
mysql -u${DB_USERNAME} -p${DB_PASSWORD} -h${DB_HOST} ${DB_DATABASE} < /root/qubet.sql
echo "QUBET DB DONE"


echo "Stop running server"
mysqladmin shutdown -uroot -p${MYSQL_ROOT_PASSWORD}

exec mysqld --user=root