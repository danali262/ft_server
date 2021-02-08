#Base OS
FROM debian:buster

# Copy files to current dir
COPY srcs/. /root/

# Installing updates, wget, and apt-utils
RUN apt-get -y update
RUN apt-get -y install wget
RUN apt-get -y install apt-utils

# Install nginx
RUN apt-get -y install nginx

# Install MySQL
RUN apt-get -y install mariadb-server

# Install PHP for processing
RUN apt-get -y install php php-mysql php-fpm php-cli php-mbstring php-gd php-cgi

# Install and configure	SSL certificate
RUN apt-get -y install libnss3-tools
RUN wget https://github.com/FiloSottile/mkcert/releases/download/v1.4.3/mkcert-v1.4.3-linux-amd64
RUN mv mkcert-v1.4.3-linux-amd64 mkcert
RUN chmod 777 mkcert
RUN ./mkcert localhost
RUN rm -rf mkcert
RUN mv ./localhost.pem ./etc/nginx
RUN mv ./localhost-key.pem ./etc/nginx

# Configure nginx
RUN mv /root/index.html /var/www/html
RUN mv /root/index.sh .
RUN mv /root/nginx.config /etc/nginx/sites-available
RUN ln -fs /etc/nginx/sites-available/nginx.config /etc/nginx/sites-enabled
RUN nginx -t

# Configure MySQL
RUN bash /root/mysql.sh

# Install and configure PHPMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-english.tar.gz
RUN tar xzfv phpMyAdmin-5.0.4-english.tar.gz -C /root
RUN mkdir /var/www/html/phpmyadmin
RUN cp -a /root/phpMyAdmin-5.0.4-english/. /var/www/html/phpmyadmin/
RUN rm -rf /root/phpMyAdmin-5.0.4-english
RUN rm -rf phpMyAdmin-5.0.4-english.tar.gz
RUN mv /root/config.inc.php /var/www/html/phpmyadmin

# Install and configure Wordpress
RUN wget https://wordpress.org/latest.tar.gz
RUN mkdir /var/www/html/wordpress
RUN tar xzvf latest.tar.gz -C /var/www/html/wordpress
RUN rm -rf latest.tar.gz
RUN mv /root/wp-config.php /var/www/html/wordpress/

# Grant permissions
RUN chown -R www-data:www-data /var/www/*
RUN chmod -R 755 /var/www/*

# Start services
CMD service mysql restart && service php7.3-fpm start && nginx -g 'daemon off;'