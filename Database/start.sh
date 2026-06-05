#!/bin/bash

docker stop music_db
docker rm music_db

docker stop user_db
docker rm user_db

docker run -d \
  --name music_db \
  --network microservices-net \
  -e MYSQL_ROOT_PASSWORD=root \
  -e MYSQL_DATABASE=music_db \
  -e MYSQL_USER=music \
  -e MYSQL_PASSWORD=musicpass \
  mysql:8.0

docker run -d \
  --name user_db \
  --network microservices-net \
  -e MYSQL_ROOT_PASSWORD=root \
  -e MYSQL_DATABASE=user_db \
  -e MYSQL_USER=user \
  -e MYSQL_PASSWORD=userpass \
  mysql:8.0
