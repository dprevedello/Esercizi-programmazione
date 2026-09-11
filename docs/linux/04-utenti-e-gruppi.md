# Utenti e gruppi

Linux è un sistema multiutente: ogni processo e ogni file appartengono a un utente e a un gruppo, e i permessi (vedi la pagina precedente) si basano proprio su questa distinzione.

## `whoami`

Stampa il nome dell'utente con cui si è collegati.

```bash
whoami
```

## `id`

Mostra utente, gruppo primario e gruppi secondari a cui appartiene l'utente corrente.

```bash
id
```

## `who` e `w`

Mostrano quali utenti sono collegati al sistema in quel momento (utile su server condivisi); `w` aggiunge anche cosa stanno facendo.

## `su` e `sudo`

- **`su nome_utente`** ("**s**witch **u**ser") apre una sessione come un altro utente, chiedendone la password.
- **`sudo comando`** ("**s**uper**u**ser **do**") esegue un singolo comando con i privilegi di amministratore (**root**), chiedendo la password dell'utente corrente (se autorizzato).

```bash
sudo apt update
```

## Il file `/etc/passwd`

Contiene l'elenco degli utenti registrati sul sistema (nome, id numerico, home, shell predefinita). Si può consultare con:

```bash
cat /etc/passwd
```

!!! warning "Esegui in locale"
    `su` e `sudo` richiedono una password e privilegi di amministratore: non funzionano nella sandbox online. Prova questi comandi in un terminale Linux reale (o in una macchina virtuale) di cui hai i diritti di amministratore.

## Prova tu

<div class="oc-embed"
     data-path="Linux/04-Utenti-e-gruppi/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
