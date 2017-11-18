FROM nginx:1.13.6

ADD nginx/vhost.conf /etc/nginx/conf.d/default.conf