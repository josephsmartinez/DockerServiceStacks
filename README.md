# CASTIC Docker Containers

## compose-wiki

docker-compose tree for https://wiki.js.org/ , consisting of 3 images: wiki-js, mongo and nginx

## configuration

1. Change path to the local directory in docker-compose.yml, in the volumes: section of the wiki service
1. Change hostname in docker-compose.yml, in WIKI_HOST
1. Put your certificate in nginx/ssl subdirectory and the private key in privkey.pem in the same directory

## usage

To launch: in the main directory (where docker-compose.yml is)

`docker-compose up`

To rebuild (if you make changes to docker-compose, or any Dockerfile or anything else)

`docker-compose build`

``` docker
docker volume create portainer_data
docker run -d -p 9000:9000 -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer
```