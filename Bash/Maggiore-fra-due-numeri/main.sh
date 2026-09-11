#!/bin/bash
# Confronta due numeri e stampa quale dei due è il maggiore.

a=12
b=27

if (( a > b )); then
    echo "Il maggiore è $a"
elif (( b > a )); then
    echo "Il maggiore è $b"
else
    echo "I due numeri sono uguali"
fi
