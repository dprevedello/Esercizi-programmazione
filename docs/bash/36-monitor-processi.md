# Monitor processi

Scrivi uno script Bash che individui tutti i processi `sleep` in esecuzione, ne stampi i PID e li termini uno per uno.

## Obiettivo

Avviare alcuni processi `sleep` in background, individuarli con `ps` combinato a `grep` e `awk`, stamparne i PID e infine terminarli con `kill`.

## Descrizione

Combinando **`ps aux`** (elenco di tutti i processi, visto nella sezione [Linux](../linux/index.md)) con **`grep`**, si isolano solo le righe che interessano:

```bash
ps aux | grep "sleep"
```

C'è un problema: anche il comando `grep "sleep"` stesso compare temporaneamente nell'elenco dei processi, e verrebbe trovato da sé stesso! Il trucco per evitarlo è racchiudere tra parentesi quadre una lettera del testo cercato, ad esempio `"[s]leep"`: il pattern cerca ancora la parola "sleep", ma il comando `grep` in esecuzione in quel momento si chiama letteralmente `grep [s]leep` (con le parentesi quadre), che non corrisponde più al pattern.

Una volta isolate le righe giuste, **`awk '{print $2}'`** ne estrae solo la seconda colonna, che nel formato di `ps aux` è il **PID** del processo.

## Suggerimenti

- `$(comando)` dentro un `for pid in $(...)` esegue il comando e cicla su ogni parola del suo output: qui, su ogni PID trovato.
- `kill PID` chiede al processo di terminare; se un processo non rispondesse, esiste anche `kill -9 PID` per forzarne la chiusura immediata.
- Estensione: invece di terminare tutti i processi trovati, prova a terminare solo il primo, usando `head -n 1`.

## Soluzione

```bash
--8<-- "Bash/Monitor-processi/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Monitor-processi/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
