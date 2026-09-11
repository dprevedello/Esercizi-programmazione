# Permessi e proprietari

Ogni file e cartella in Linux ha un proprietario, un gruppo e un insieme di permessi che stabiliscono chi può leggerlo, modificarlo o eseguirlo.

## Leggere `ls -l`

```
-rwxr--r-- 1 daniele docenti 220 9 set 10:00 script.sh
```

La prima colonna si legge così:

| Blocco | Significato |
|---|---|
| `-` (1° carattere) | tipo di file: `-` file normale, `d` cartella, `l` collegamento simbolico |
| `rwx` (2°-4°) | permessi del **proprietario**: lettura, scrittura, esecuzione |
| `r--` (5°-7°) | permessi del **gruppo** |
| `r--` (8°-10°) | permessi per **tutti gli altri** |

Dopo i permessi: proprietario (`daniele`), gruppo (`docenti`), dimensione, data e nome del file.

## `chmod`

Modifica i permessi di un file (**ch**ange **mod**e). Si può usare in due forme:

**Forma simbolica**, con `+`/`-` su `u` (utente), `g` (gruppo), `o` (altri):

```bash
chmod +x script.sh        # aggiunge il permesso di esecuzione a tutti
chmod u+w,g-w file.txt    # aggiunge scrittura al proprietario, la toglie al gruppo
```

**Forma numerica (ottale)**, un numero da 0 a 7 per proprietario/gruppo/altri (4=lettura, 2=scrittura, 1=esecuzione, sommabili):

```bash
chmod 644 file.txt   # rw- r-- r--
chmod 755 script.sh  # rwx r-x r-x
```

## `chown` e `chgrp`

Cambiano rispettivamente il **proprietario** e il **gruppo** di un file. A differenza di `chmod`, richiedono di norma i permessi di amministratore (`sudo`) per assegnare un file a un altro utente.

```bash
sudo chown mario file.txt
sudo chgrp docenti file.txt
```

## Prova tu

<div class="oc-embed"
     data-path="Linux/03-Permessi-e-proprietari/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>

!!! info "chown e chgrp nella sandbox"
    L'esempio eseguibile si concentra su `chmod`, che non richiede privilegi speciali. `chown`/`chgrp` verso un altro utente richiedono `sudo` e vanno provati in un terminale Linux reale (o in una macchina virtuale).
