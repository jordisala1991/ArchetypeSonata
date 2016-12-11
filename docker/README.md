# Docker

## Setup

- [Docker](https://www.docker.com/)
- [Kitematic](https://kitematic.com/)
- [Docker-sync](https://github.com/EugenMayer/docker-sync)

## Usage

- Run `sh start.sh` (this will block the terminal)
- Run `sh configure.sh` on other terminal
- Open `localhost:8080` in your browser

## Scripts

- *start.sh:* Builds the containers and starts the docker-sync-stack
- *clean.sh:* Removes all unused images and containers (use at your own risk)
- *configure.sh:* Does all required configuration (copy files, install vendors, run database migrations)

## TODO

- Test on linux
- Add phpunit and scripts
- Improve installation steps
- Find a way to not use localhost:8080
