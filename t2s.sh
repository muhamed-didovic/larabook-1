#!/bin/bash

#ignore me unless you want a command to convert all your tabs to spaces excluding the vendor directory
echo "converting tabs to spaces"
find . -name '*.php' ! -type d -path './vendor' -prune -o  -path './node_modules' -prune -exec bash -c 'expand -t 4 "$0" > /tmp/e && mv /tmp/e "$0"' {} \;
#find . -prune \( -name vendor -o -name node_modules \) ! -type d -exec bash -c 'expand -t 4 "$0" > /tmp/e && mv /tmp/e "$0"' {} \;
echo "Finished!"