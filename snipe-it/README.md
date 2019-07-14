# SnipeIT Docker Container Deployment

VERSION 0.0.1

***CHANGE PYTHON SCRIPT TO SHELL OR GO***

ToDos:  

- change plain text password
- create docker-compose file if possible [DONE]
- add mounted www/html dir for ssh access
- change from python to bash script

## Linking www directory 

### Simple run
> docker run --name [ENTER NAME] --env-file=[ENV FILE NAME] --mount source=snipesql-vol,target=/var/lib/mysql -d -P mysql:5.6
### Network Linking
> docker run -d -p 95:80 --name="dev-caseidb" --network=snipe-it_default --link snipe-mysql:mysql --env-file=case_env --mount source=snipe-vol-dev,dst=/var/lib/snipeit --mount source=dev-www-snipeit,dst=/var/www/html snipe/snipe-it
### Non-Network linking
> docker run -d -p 95:80 --name="dev-caseidb" --link snipe-mysql:mysql --env-file=case_env --mount source=snipe-vol-dev,dst=/var/lib/snipeit --mount source=dev-www-snipeit,dst=/var/www/html snipe/snipe-it

## Install

Run  
`./caseidbup`

## SSL disabled Installation

Installation:  

1. `docker pull snipe/snipe-it`

2. create env file

    ```conf
    # Mysql Parameters
    MYSQL_ROOT_PASSWORD=YOUR_SUPER_SECRET_PASSWORD
    MYSQL_DATABASE=snipeit
    MYSQL_USER=snipeit
    MYSQL_PASSWORD=YOUR_snipeit_USER_PASSWORD

    # Email Parameters
    # - the hostname/IP address of your mailserver
    MAIL_PORT_587_TCP_ADDR=smtp.whatever.com
    #the port for the mailserver (probably 587, could be another)
    MAIL_PORT_587_TCP_PORT=587
    # the default from address, and from name for emails
    MAIL_ENV_FROM_ADDR=youremail@yourdomain.com
    MAIL_ENV_FROM_NAME=Your Full Email Name
    # - pick 'tls' for SMTP-over-SSL, 'tcp' for unencrypted
    MAIL_ENV_ENCRYPTION=tcp
    # SMTP username and password
    MAIL_ENV_USERNAME=your_email_username
    MAIL_ENV_PASSWORD=your_email_password

    # Snipe-IT Settings
    APP_ENV=production
    APP_DEBUG=false
    APP_KEY=<<Fill in Later!>>
    APP_URL=http://127.0.0.1:YOUR_PORT_NUMBER
    APP_TIMEZONE=US/Pacific
    APP_LOCALE=en
    ```

3. `docker run --name snipe-mysql --env-file=my_env_file --mount source=snipesql-vol,target=/var/lib/mysql -d -P mysql:5.6`

4. `docker run --rm snipe/snipe-it`

5. copy app key into env file

    ```shell
    Please re-run this container with an environment variable $APP_KEY
    An example APP_KEY you could use is: 
    base64:D5oGA+zhFSVA3VwuoZoQ21RAcwBtJv/RGiqOcZ7BUvI=
    ```

    NOTE: Make sure to include the base64: prefix if it is given!

6. `docker run -d -p YOUR_PORT_NUMBER:80 --name="snipeit" --link snipe-mysql:mysql --env-file=my_env_file --mount source=snipe-vol,dst=/var/lib/snipeit snipe/snipe-it`

## SSL enabled Installation

Coming soon!

## MySQL docker-compose resources

[Issue with SQL Link](https://github.com/snipe/snipe-it/issues/5074)  
[Linked SQL Option](https://github.com/jnmcfly/Snipe-ITcompose/blob/master/docker-compose.yml)

## Commands used for restoring after installation

### From Host

Example moving files from host to container mount points
`cp -r models/ /var/lib/docker/volumes/snipe-it_snipe-vol/_data/`  
`cp resources/views/hardware/view.blade.php /var/lib/docker/volumes/snipe-it_snipe-vol/_data/`  

### FROM Container

SQL dump  
`mysqldump --databases db1 db2 db3 > dump.sql`  
Example replacing a simple file manually from container shell  
`cp /var/lib/snipeit/view.blade.php /var/www/html/resources/views/hardware/`  
Replacing a images  
`cp /var/lib/snipeit/models/* /var/www/html/public/uploads/models/`  
