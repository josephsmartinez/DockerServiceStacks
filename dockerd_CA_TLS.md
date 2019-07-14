# Portainer Endpoint Configuration

## Important notes

systemd vs daemon.json
Configuring Docker to listen for connections using both the systemd 
unit file and the daemon.json file causes a conflict that prevents 
Docker from starting.

## Resources

[Docker Engine Security](https://docs.docker.com/engine/security/https/#related-information)  
[Docker daemon](https://docs.docker.com/config/daemon/)  
[Docker dockerd](https://docs.docker.com/engine/reference/commandline/dockerd/#daemon-configuration-file)  
[Docker systemd](https://docs.docker.com/config/daemon/systemd/)  

***During testing connection shutdown all running containers before connecting permenently***

***Make sure filewall setting reflect for TLS port***

## Steps to configuration

### Create directory .docker and CA/TLS keys

Create .docker at root home directory
Create Keys outlined within the following...
https://docs.docker.com/engine/security/https/

### Stop docker.service

The docker service needs to be off when using dockerd command for testing.
`systemctl stop docker.service`

### Test configurations

Run the following from the .docker directory

``` shell
dockerd --tlsverify \
--debug \
--tlscacert=ca.pem \
--tlscert=server-cert.pem \
--tlskey=server-key.pem   \
-H=0.0.0.0:2376
```

If the connection end-point API can connect on Portainer or 
using the following command succeeds, then the endpoint are 
configured correctly.

To be ran from another endpoint with CA/TLS files

``` shell
docker --tlsverify \
--tlscacert=ca.pem \
--tlscert=cert.pem --tlskey=key.pem \
 -H=$HOST:2376 version
```

### Adjusting docker.service

Open the following file  
/lib/systemd/system/docker.service
or if the service has been enabled
/etc/systemd/system/multi-user.target.wants/docker.service

Amend the following line  
***From...***
`ExecStart=/usr/bin/dockerd -H unix://`
***To...***
`ExecStart=/usr/bin/dockerd`
Just remove the `-H unix://`

### Restart systemd

`systemctl daemon-reload`

### Move daemon.json to /etc/docker/

Place daemon file in the correct path  
`/etc/docker/daemon.json`

```JSON
{
  "debug": true,
  "tlsverify": true,
  "tlscert": "/root/.docker/server-cert.pem",
  "tlskey": "/root/.docker/server-key.pem",
  "tlscacert": "/root/.docker/ca.pem",
  "hosts": ["tcp://{{client_hostname}}:2376"]  
}
```

NOTE: Make sure to change the client hostname

### Start and enable docker.service

```shell
systemctl restart docker.service
systemctl enable docker.service
```
