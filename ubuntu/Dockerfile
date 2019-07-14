FROM ubuntu:18.04

LABEL maintainer="josemart@fiu.edu"

RUN apt-get update && apt-get install -y openssh-server python ansible git vim sudo iputils-ping net-tools dnsutils
RUN mkdir /var/run/sshd

RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin no/' /etc/ssh/sshd_config
RUN useradd -ms /bin/bash -U castic

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd
RUN sed '21i\castic ALL=(ALL:ALL) ALL' /etc/sudoers -i

# Change passwords for users 
RUN sed -i '/castic/c\castic:$6$tfNzjU50OT6GTo$lkQ.lcWlE0980YWUDzONzQtfZBxn9V8B5PidmMyn/TpFbkuUM481.134.2S8T.yMkljwhRPUOISQiUQ6co4dZ.:17911:0:99999:7:::' /etc/shadow
RUN sed -i '/root/c\root:$6$ZPgA86xx8$Kd64pDrRs020VdkIRS8COCUY833TmJPZHFg1ovf9dZDakhUOYdtcrjWPqZHzgUNF4JIqOBoYkMDtLIW7Cye.c1:17911:0:99999:7:::' /etc/shadow

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

#EXPOSE 22
CMD ["/usr/sbin/sshd", "-D"]
