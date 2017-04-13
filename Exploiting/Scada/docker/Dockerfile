FROM alpine:3.4

RUN apk update && apk add --no-cache \
    supervisor && \
    apk del gcc musl-dev linux-headers libffi-dev augeas-dev python-dev

## Fix libs
RUN ln -s /lib/ /lib64

## Supervisor
ADD conf/supervisord.conf /etc/supervisord.conf

## Copy code
ADD src/ /opt/pwn/
RUN chmod +x /opt/pwn/scada

## Start
CMD ["/usr/bin/supervisord","-n","-c","/etc/supervisord.conf"]
