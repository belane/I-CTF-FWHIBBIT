FROM alpine:3.4

## ENV
ENV php_conf /etc/php7/php.ini 
ENV fpm_conf /etc/php7/php-fpm.d/www.conf

## Base Package
RUN sed -i -e "s/v3.4/edge/" /etc/apk/repositories && apk update && \
    apk add --no-cache nginx \
    supervisor \
    php7-fpm \
    libbsd \
    php7-dom \
    php7-xml &&\
    mkdir -p /etc/nginx && \
    mkdir -p /run/nginx && \
    mkdir -p /var/log/supervisor && \
    apk del gcc musl-dev linux-headers libffi-dev augeas-dev python-dev

## Supervisor
ADD conf/supervisord.conf /etc/supervisord.conf

## Nginx config
RUN rm -Rf /etc/nginx/nginx.conf
ADD conf/nginx.conf /etc/nginx/nginx.conf

## Nginx site conf
RUN mkdir -p /etc/nginx/sites-available/ && \
mkdir -p /etc/nginx/sites-enabled/ && \
rm -Rf /var/www/* && \
mkdir /var/www/html/
ADD conf/nginx-site.conf /etc/nginx/sites-available/default.conf
RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf
RUN chown -Rf nginx.nginx /var/www/html

## PHP configs
RUN rm -Rf ${php_conf} && \
    rm -Rf ${fpm_conf}
ADD conf/php.ini ${php_conf}
ADD conf/www.conf ${fpm_conf}
RUN ln -s /etc/php7/php.ini /etc/php7/conf.d/php.ini && \
    find /etc/php7/conf.d/ -name "*.ini" -exec sed -i -re 's/^(\s*)#(.*)/\1;\2/g' {} \;

## Copy code
ADD src/ /var/www/html/
ADD errors/ /var/www/errors

## Extra files RETO WEB 03
RUN echo "# fwhibbit{R3M3MB3R_XXE_AND_CURL_RUL3S}" >> /etc/passwd

## Start
CMD ["/usr/bin/supervisord","-n","-c","/etc/supervisord.conf"]
