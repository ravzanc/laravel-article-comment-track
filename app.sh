#!/bin/sh

help="  Script for local deployment
Available commands:
${LBLUE}start${NC} - run the project
${LBLUE}stop${NC} - stop all project's containers
${LBLUE}composer${NC} - run composer commands
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
 composer )
    shift
    eval "docker exec -it lact_phpfpm_1 php composer.phar ${@}" ;;
  * )
    echo "${help}" ;;
esac

cd ..

return 0
