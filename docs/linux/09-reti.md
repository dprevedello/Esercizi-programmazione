# Reti

Comandi per esplorare la configurazione di rete di una macchina e comunicare con altre macchine. La maggior parte richiede una connessione reale a Internet o a un'altra macchina: nella sandbox online, senza accesso alla rete, questi comandi non funzionano (o restituiscono solo informazioni locali).

## `ip` (e il più vecchio `ifconfig`)

Mostra e configura le interfacce di rete della macchina.

```bash
ip addr show     # elenco delle interfacce e dei relativi indirizzi IP
ip route         # tabella di instradamento (gateway predefinito, ecc.)
```

`ifconfig` è il comando storico equivalente a `ip addr`: su molte distribuzioni recenti non è più installato di default, sostituito dal pacchetto `iproute2` (`ip`).

## `hostname`

Stampa (o imposta) il nome con cui la macchina si identifica in rete.

```bash
hostname
```

## `ping`

Verifica se un host è raggiungibile in rete, inviandogli dei pacchetti e misurando il tempo di risposta.

```bash
ping -c 4 8.8.8.8   # invia 4 pacchetti (senza -c, ping non si fermerebbe da solo)
```

## `curl` e `wget`

Scaricano il contenuto di un URL, o effettuano richieste HTTP/HTTPS da riga di comando.

```bash
curl https://example.com
wget https://example.com/file.zip
```

## `ssh` e `scp`

- **`ssh utente@host`** apre una sessione di terminale su una macchina remota, in modo sicuro e cifrato.
- **`scp file utente@host:percorso`** copia un file su (o da) una macchina remota, usando lo stesso protocollo di `ssh`.

## Prova tu

<div class="oc-embed"
     data-path="Linux/09-Reti/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>

!!! warning "Esegui in locale"
    `ping`, `curl`, `wget`, `ssh` e `scp` richiedono una connessione di rete reale verso un altro host: non funzionano nella sandbox online, che è isolata da Internet. Provali da un terminale Linux reale (o da una macchina virtuale) connesso alla rete.
