# CASTIC Ansible Container version 0.0.1

Container ready ansible with sshd service.

## NOTE: Make sure Dokcer and docker-compose are installed

[Docker](https://docs.docker.com/)
[Install Docker Compose](https://docs.docker.com/compose/install/)

## Command to build from compose

`docker-compose up -d`
`docker-compose down`

## Commands for building the images

`docker build -t ansible .`
`docker build -t ansible .`
`docker run -d -P --name ansible ansible`
`docker port ansible`
`ssh castic@localhost -p <port number assigned>`

## Software installations

- git
- vim
- ansible
- python,
- sshd
- sudo
- iputils-ping

## Post Installation:

- git download ansible from private repo

## ToDos

Dockerfile for systemd base image
``` docker
FROM centos:7
ENV container docker
RUN (cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == \
systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*;
VOLUME [ "/sys/fs/cgroup" ]
CMD ["/usr/sbin/init"]
```
[](https://github.com/docker-library/docs/tree/master/centos#systemd-integration)