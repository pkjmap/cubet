FROM postman/newman:5-alpine

RUN apk add --no-cache tzdata \
    && ln -s /usr/share/zoneinfo/Australia/Melbourne /etc/timezone

ENV TZ="Australia/Melbourne"
