#!/bin/bash
 
NGINX_CONF_PATH="/home/mohammad/Documents/Programming/Backend/Laravel/MusicServiceBaseApp/Nginx/nginx.conf"

if sudo docker inspect gateway_nginx >/dev/null 2>&1; then
    echo "gateway_nginx exists."
    sudo docker start gateway_nginx >/dev/null 2>&1 || true
else
    echo "Creating gateway_nginx..."
    sudo docker run -d \
      --name gateway_nginx \
      --network microservices-net \
      -p 8080:80 \
      -v "$NGINX_CONF_PATH":/etc/nginx/nginx.conf:ro \
      -v musicservice_music_shared_storage:/var/www/html/storage/app/private:ro \
      nginx
fi

