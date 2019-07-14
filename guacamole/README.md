# Installing Guacamole with Docker

## Requirments

A typical Docker deployment of Guacamole will involve three separate containers, linked together at creation time:

- guacamole/guacd
Provides the guacd daemon, built from the released guacamole-server source with support for VNC, RDP, SSH, and telnet.

- guacamole/guacamole
Provides the Guacamole web application running within Tomcat 8 with support for WebSocket. The configuration necessary to connect to guacd, MySQL, PostgreSQL, LDAP, etc. will be generated automatically when the image starts based on Docker links or environment variables.

- mysql or postgresql
Provides the database that Guacamole will use for authentication and storage of connection configuration data.

This separation is important, as it facilitates upgrades and maintains proper separation of concerns. With the database separate from Guacamole and guacd, those containers can be freely destroyed and recreated at will. The only container which must persist data through upgrades is the database.

[Installing Guacamole with Docker](https://guacamole.apache.org/doc/gug/guacamole-docker.html)

`$ docker run --name some-guacd -d guacamole/guacd`
When run in this manner, guacd will be listening on its default port 4822, but this port will only be available to Docker containers that have been explicitly linked to some-guacd.

Important
If using PostgreSQL or MySQL for authentication, you will need to initialize the database manually. Guacamole will not automatically create its own tables, but SQL scripts are provided to do this.


