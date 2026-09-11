# Processi e risorse di sistema

Ogni programma in esecuzione è un **processo**, identificato da un numero (**PID**). Questi comandi permettono di osservarli, controllarli e monitorare le risorse del sistema.

## `ps`

Elenca i processi in esecuzione.

```bash
ps
ps aux   # tutti i processi del sistema, con utente e dettagli
```

## `top`

Mostra i processi in tempo reale, aggiornandosi automaticamente, ordinati tipicamente per consumo di CPU: è lo strumento principale per capire "cosa sta rallentando il sistema". È **interattivo** e occupa tutto lo schermo (si esce con `q`); esiste anche una modalità non interattiva, che stampa una singola "fotografia" e termina subito, utile per esempi o script:

```bash
top -bn1   # batch mode, una sola istantanea
```

## `kill` e i segnali

Invia un **segnale** a un processo, identificato dal suo PID. Il più comune è la richiesta di terminazione:

```bash
kill 1234       # richiesta "gentile" di terminazione (SIGTERM)
kill -9 1234    # terminazione forzata e immediata (SIGKILL), da usare solo se il processo non risponde
```

## `&`, `jobs`, `bg`, `fg`

Far seguire `&` a un comando lo avvia **in background**, restituendo subito il controllo del terminale:

```bash
sleep 60 &
```

- **`jobs`** elenca i processi in background avviati dalla shell corrente.
- **`bg`** riporta in background un job che era stato sospeso.
- **`fg`** riporta in primo piano un job in background.

## `df` e `du`

- **`df -h`** (**d**isk **f**ree) mostra lo spazio libero/occupato su ciascun filesystem montato.
- **`du -sh cartella`** (**d**isk **u**sage) mostra lo spazio totale occupato da una cartella e dal suo contenuto.

L'opzione **`-h`** (**h**uman-readable) in entrambi i casi mostra le dimensioni in KB/MB/GB invece che in byte.

## `free`

Mostra memoria RAM totale, usata e libera.

```bash
free -h
```

## Prova tu

<div class="oc-embed"
     data-path="Linux/08-Processi-e-risorse/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
