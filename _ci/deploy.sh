#!/usr/bin/env bash

# $DEPLOY_SRC = ~/src/github.com/ascribe/wp-theme/ascribe/

set -e;

echo "$(tput setaf 136)"
echo "============================================="
echo "         Start deployment: live "
echo "============================================="
echo "$(tput sgr0)" # reset

rsync --recursive --delete --delete-excluded --checksum --verbose -e "ssh" $DEPLOY_SRC $DEPLOY_USER@$DEPLOY_HOST:$DEPLOY_PATH

echo "$(tput setaf 64)" # green
echo "---------------------------------------------"
echo "      ✓ done deployment: live"
echo "---------------------------------------------"
echo "$(tput sgr0)" # reset

exit;
