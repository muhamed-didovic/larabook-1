#!/bin/bash
echo "converting tabs to spaces"
find . -path ./vendor -prune -o -name '*.php' ! -type d -exec bash -c 'expand -t 4 "$0" > /tmp/e && mv /tmp/e "$0"' {} \;
echo "Finished!"