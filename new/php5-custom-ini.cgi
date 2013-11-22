#!/bin/sh
export PHP_FCGI_CHILDREN=3
exec /hsphere/shared/php5/bin/php-cgi -c /hsphere/local/home/c72738/dialoggroup.com/cgi-bin/php.ini