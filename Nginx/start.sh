#!/bin/bash

if sudo docker inspect gateway_nginx >/dev/null 2>&1; then
    echo "gateway_nginx exists."
    sudo docker start gateway_nginx >/dev/null 2>&1 || true
else
    echo "Creating gateway_nginx..."
    sudo docker run -d \
      --name gateway_nginx \
      --network microservices-net \
      -p 8080:80 \
      -v /home/mohammad/Documents/Programming/Backend/Laravel/MusicServiceBaseApp/Nginx/default.conf:/etc/nginx/conf.d/default.conf:ro \
      nginx
fi
