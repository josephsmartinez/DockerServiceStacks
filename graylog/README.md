# Installation and Configuration

- collector sidecar
- nxlog

## Graylog 3.0 

http://docs.graylog.org/en/stable/pages/installation/docker.html

## Graylog lab (Multiple Nodes)

[Graylog lab (Multiple Nodes)](https://github.com/jalogisch/d-gray-lab/blob/master/docker-compose.yml)

## Resource pages

[sidecar github](https://github.com/Graylog2/collector-sidecar)  
[nxlog installation page](https://nxlog.co/documentation/nxlog-user-guide/deploy-rhel.html)  
Sidecar version Graylog server version
0.1.x 2.2.x, 2.3.x, 2.4.x 2.5.x

## Sidecar

Download Collector File  
`wget https://github.com/Graylog2/collector-sidecar/releases/download/0.1.6/collector-sidecar-0.1.6-1.x86_64.rpm`  

Install from rpm  
`rpm -i collector-sidecar-0.1.6-1.x86_64.rpm`  

Install init systemd service  
`graylog-sidecar -service install`  

Start service  
`systemctl restart collector-sidecar.service`  

## Nxlog

Download system software  
`wget https://nxlog.co/system/files/products/files/348/nxlog-ce-2.10.2150-1_rhel7.x86_64.rpm`  

Option I from RPM
Install dependencies  
`yum install libdbi`  
`rpm -i nxlog-ce-2.10.2150-1_rhel7.x86_64.rpm`  

Option II using YUM  
`yum install nxlog-ce-2.10.2150-1_rhel7.x86_64.rpm`  

systemctl status collector-sidecar

systemctl status nxlog.service

***NOTE:***

When configuring nxlog some common errors may be noted within /var/log/nxlog/* about permission issues. To corrent this just make the nessisary file and change the ownership to nxlog user.

## Network Testing

```text
echo -n -e '{ "version": "1.1", "host": "example.org", "short_message": "A short message", "level": 5, "_some_info": "foo" }'"\0" | nc -w5 goofyaustin.ad.fiu.edu 12201
```