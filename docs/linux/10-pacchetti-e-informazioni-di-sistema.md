# Pacchetti e informazioni di sistema

Comandi per installare software e per ottenere informazioni generali sul sistema operativo in uso.

## `uname`

Stampa informazioni sul sistema e sul kernel in esecuzione.

```bash
uname -a   # tutte le informazioni: kernel, versione, architettura, nome macchina
```

## Gestori di pacchetti: `apt` e `dpkg`

Su Debian, Ubuntu e derivate, il software si installa tramite **pacchetti**, gestiti da `apt` (interfaccia semplificata) e `dpkg` (motore di basso livello che `apt` usa internamente).

```bash
sudo apt update              # aggiorna l'elenco dei pacchetti disponibili
sudo apt install nome_pacchetto
sudo apt remove nome_pacchetto
dpkg -l                      # elenca i pacchetti installati
```

Su altre famiglie di distribuzioni si usano gestori diversi: `dnf`/`yum` su Fedora e RHEL/CentOS, `pacman` su Arch Linux — il concetto (pacchetti + repository centralizzato) resta lo stesso.

## `history`

Mostra i comandi digitati in precedenza nella sessione di terminale corrente, numerati in ordine.

```bash
history        # elenco completo
history 10     # solo gli ultimi 10 comandi
!42            # riesegue il comando numero 42 della history
```

## `man`

Apre il **manuale** di un comando: descrizione, sintassi completa, tutte le opzioni disponibili. È la prima risorsa da consultare quando non si ricorda un'opzione.

```bash
man ls
```
Si scorre come `less` (frecce per muoversi, `q` per uscire) ed è quindi anch'esso un comando interattivo.

## Prova tu

<div class="oc-embed"
     data-path="Linux/10-Pacchetti-e-informazioni-di-sistema/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>

!!! warning "Esegui in locale"
    `apt`/`dpkg` richiedono privilegi di amministratore e, per aggiornare l'elenco dei pacchetti, una connessione a Internet: non sono eseguibili nella sandbox online. `history` in questa pagina non stamperebbe nulla di utile, perché ogni esecuzione dello script parte da una sessione di shell nuova, senza comandi precedenti nella cronologia; è pensato per l'uso quotidiano da terminale. Anche `man` richiede spesso un pacchetto aggiuntivo (`man-db`) non sempre presente in ambienti minimali come la sandbox.
