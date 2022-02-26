#!/bin/sh

help="  Script for local deployment
Available commands:
${LBLUE}start${NC} - run the project
${LBLUE}stop${NC} - stop all project's containers
"

action=$1

cd docker || exit

export UID=$(id -u)
export GID=$(id -g)

case "$action" in
  start )
    eval "docker-compose up -d" ;;
  stop )
    eval "docker-compose stop" ;;
  * )
    echo "${help}" ;;
esac

cd ..

return 0
