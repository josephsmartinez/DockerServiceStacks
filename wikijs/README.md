# compose-wiki

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

`sudo docker run -p 8080:3000 -e "WIKI_ADMIN_EMAIL=admin@example.com" -v ./config.yml:/var/wiki/config.yml requarks/wiki`

[WikiJs](https://github.com/DidierA/docker-compose-wiki-js)

https://blog.programster.org/deploy-your-own-wiki-with-wikijs-and-docker

https://en.wikipedia.org/wiki/Comparison_of_wiki_software