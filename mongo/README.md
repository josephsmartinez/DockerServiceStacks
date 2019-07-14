# Mongo DB and GUI Frontend

## Example 1

``` yml
version: '3'
services:
my-mongoDB:
image: mongo:latest
volumes:
- db-data:/data/db
- mongo-config:/data/configdb

volumes:
db-data:
mongo-config:
```

https://hub.docker.com/_/mongo