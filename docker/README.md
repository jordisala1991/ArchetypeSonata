# Docker

## Setup

- [Docker](https://www.docker.com/)
- [Kitematic](https://kitematic.com/)
- [Docker-sync](https://github.com/EugenMayer/docker-sync) (only for OSx)

## Usage

- Run `sh start.sh` (this will block the terminal)
- Run `sh configure.sh` on other terminal
- Open `localhost:8080` in your browser

## Scripts

- **start.sh:** Builds the containers and starts the docker-sync-stack
- **configure.sh:** Does all required configuration (copy files, install vendors, run database migrations)

## Commands

- `docker image prune -af` prune all images from docker
- `docker exec -i -t container_name sh` open a shell to *container_name*
- `docker-sync-stack clean` remove all containers

## TODO

- Test on linux
- Add phpunit and scripts
- Improve installation steps
- Find a way to not use localhost:8080
