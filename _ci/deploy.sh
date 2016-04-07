#!/usr/bin/env bash

# $DEPLOY_SRC = ~/src/github.com/ascribe/wp-theme/ascribe/

set -e;

if [ $CI_BRANCH == "master" ]; then
    rsync --recursive --delete --delete-excluded --checksum --verbose -e "ssh" $DEPLOY_SRC $DEPLOY_USER@$DEPLOY_HOST:$DEPLOY_PATH
fi;

exit;
