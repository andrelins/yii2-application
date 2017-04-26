FROM ubuntu:14.04

RUN apt-get update
RUN apt-get -y install apache2
RUN apt-get -y install libapache2-mod-php5
RUN apt-get -y install php5
RUN apt-get -y install php5-mysql
RUN apt-get -y install php5-curl
RUN apt-get -y install php5-gd  
RUN apt-get -y install php5-mcrypt
RUN apt-get -y install php5-fpm
RUN apt-get -y install php5-intl
RUN apt-get update
RUN apt-get -y install php5-sqlite
RUN apt-get install php5-xdebug
RUN update-ca-certificates
RUN apt-get clean && rm -r /var/lib/apt/lists/*

RUN a2dismod mpm_event && \
    a2enmod mpm_prefork \
            ssl \
            rewrite && \
    a2ensite default-ssl && \
    ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log

RUN a2enmod deflate

WORKDIR /var/www/html

EXPOSE 80
EXPOSE 443

RUN rm -f /var/run/apache2/apache2.pid

RUN ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

ADD docker/etc/apache2/apache2.conf /etc/apache2/apache2.conf

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
