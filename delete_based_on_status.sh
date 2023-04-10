#!/bin/bash

mkdir -p tmp

grep -F '[-] want to delete' status.txt |
	tail -n +2 |
	cut -d'=' -f3 |
	awk '{ print "rm " $0 }' > tmp/del.sh

echo "Now run:"
echo ""
echo "  bash ./tmp/del.sh"
echo ""
