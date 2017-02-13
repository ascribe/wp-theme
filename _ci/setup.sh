#!/usr/bin/env bash

set -e;

echo "$(tput setaf 136)"
echo "============================================="
echo "         Installing dependencies "
echo "============================================="
echo "$(tput sgr0)" # reset

npm install gulp -g
npm install

echo "$(tput setaf 64)" # green
echo "---------------------------------------------"
echo "      ✓ done installing dependencies"
echo "---------------------------------------------"
echo "$(tput sgr0)" # reset

exit;
