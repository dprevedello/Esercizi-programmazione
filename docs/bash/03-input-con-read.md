# Input con read

Scrivi uno script Bash che chieda all'utente il proprio nome da tastiera e stampi un messaggio di benvenuto personalizzato. Salva il file come `nome_cognome_inputread.sh`.

## Obiettivo

Chiedere all'utente il proprio nome e stampare un messaggio di benvenuto personalizzato.

## Descrizione

Il comando **`read`** legge una riga da standard input e la salva in una variabile:

```bash
read nome
```

Dopo l'esecuzione di `read nome`, la variabile `nome` conterrà il testo digitato dall'utente (senza il carattere di a capo finale).

## Suggerimenti

- Stampa sempre un messaggio con `echo` prima di un `read`, per far capire all'utente cosa deve digitare.
- Puoi combinare prompt e lettura in un'unica riga con `read -p "Come ti chiami? " nome`.
- Se ometti il nome della variabile, `read` salva l'input nella variabile predefinita `REPLY`.

## Soluzione

```bash
--8<-- "Bash/Input-con-read/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Input-con-read/main.sh"
     data-lang="bash"
     data-stdin="Mario"
     data-autorun="true">
</div>
