Postgres Docker Development Container
===

About
---

Creates a simple database of users

How to use
---

- Clean deployment

Check .env file for configuration
> docker-compose config
Start database
> docker-compose up -d

- Auto database build

Just run and point to your .sql file
> sh postgres-setup-OSDISTRO-.sh
NOTE: OSDISTRO is MacOS, RHEL, or Ubuntu

Resources
---

Docker Hub - Postgres
https://hub.docker.com/_/postgres

Docker Docs - Postgres
https://docs.docker.com/samples/library/postgres/