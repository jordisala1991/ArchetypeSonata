#!/bin/sh

docker-compose build

if command -v dockedsadsar-sync-stack >/dev/null 2>&1; then
  docker-sync-stack start
else
  docker-compose -f docker-compose.yml -f docker-compose-linux.yml up
fi
