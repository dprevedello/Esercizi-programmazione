#!/bin/bash
# Dimostra la gestione di processi in background e il monitoraggio delle risorse.

echo "--- avviamo un comando in background con & ---"
sleep 5 &
pid=$!
echo "Avviato processo in background con PID $pid"

echo ""
echo "--- jobs: elenco dei job in background di questa shell ---"
jobs

echo ""
echo "--- ps: elenco dei processi (di questa shell) ---"
ps

echo ""
echo "--- kill: termina il processo in background prima che finisca da solo ---"
kill "$pid"
wait "$pid" 2>/dev/null
echo "Processo $pid terminato."

echo ""
echo "--- top -bn1: una singola 'fotografia' dei processi (modalita' non interattiva) ---"
top -bn1 2>/dev/null | head -n 8

echo ""
echo "--- free -h: memoria disponibile ---"
free -h 2>/dev/null

echo ""
echo "--- df -h: spazio libero/occupato sui filesystem montati ---"
df -h . 2>/dev/null

echo ""
echo "--- du -sh: spazio occupato dalla cartella corrente ---"
du -sh . 2>/dev/null
