#!/bin/bash

echo "Start ..."

docker compose down

echo "docker is down ..."

docker compose up -d --build

echo "docker build..."

docker network connect microservices-net user_service

echo "ready ..."
