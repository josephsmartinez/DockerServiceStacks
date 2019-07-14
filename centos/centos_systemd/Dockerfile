FROM centos/systemd

LABEL maintainer="josemart@fiu.edu"


RUN yum -y install httpd; yum clean all; systemctl enable httpd.service

EXPOSE 80

CMD ["/usr/sbin/init"]