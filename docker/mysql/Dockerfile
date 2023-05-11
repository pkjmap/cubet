FROM mysql:8.0

ADD ./start.sh /root/
ADD ./qubet.sql /root/

RUN chmod u+r+x /root/start.sh

EXPOSE 3306 33060 33061
CMD ["/root/start.sh"]