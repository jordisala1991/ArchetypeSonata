#!/bin/sh

docker image prune -af

if [ $(command -v docker-sync-stack) ]; then
  docker-sync-stack clean
fi
