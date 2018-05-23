#!/usr/bin/env bash

ASCRIBE_DEPLOY_SRC="./ascribe"
ASCRIBE_DEPLOY_USER="ubuntu"
ASCRIBE_DEPLOY_HOST="ec2-52-57-166-130.eu-central-1.compute.amazonaws.com"
ASCRIBE_DEPLOY_PATH="/var/www/ascribe-wp/wp-content/themes"

set -e;

rsync \
    --recursive \
    --delete \
    --delete-excluded \
    --checksum \
    --verbose \
    --rsync-path="sudo rsync" \
    -e "ssh" \
    $ASCRIBE_DEPLOY_SRC $ASCRIBE_DEPLOY_USER@$ASCRIBE_DEPLOY_HOST:$ASCRIBE_DEPLOY_PATH

exit;
