FROM nginx:1.19

ADD nginx.conf /etc/nginx/
ADD default.conf.tmpl /etc/nginx/conf.d/default.conf.tmpl
ADD start.sh /root/

RUN chmod u+r+x /root/start.sh

CMD ["/root/start.sh"]

EXPOSE 80
EXPOSE 443
