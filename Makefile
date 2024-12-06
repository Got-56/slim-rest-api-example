# Makefile for managing Nginx and PHP-FPM

NGINX_CONF_PATH = /etc/nginx/nginx.conf
PHP_FPM_SERVICE = php8.1-fpm
NGINX_SERVICE = nginx

start-all:
	sudo systemctl start $(NGINX_SERVICE) $(PHP_FPM_SERVICE)

stop-all:
	sudo systemctl stop $(NGINX_SERVICE) $(PHP_FPM_SERVICE)

status-all:
	sudo systemctl status $(NGINX_SERVICE) $(PHP_FPM_SERVICE)