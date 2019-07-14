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