#/bin/bash

var=`docker run --rm snipe/snipe-it`
key="${var:104:52}"
echo $key
#sed -e "s\/ENTER_KEY\/\$key/g" docker-compose.yml