# Gestionale del negozio

Realizza il gestionale del database `negozio`, riservato agli amministratori. I file `login.php` e `logout.php` sono forniti (copie di quelli dell'esercizio 45). Scrivi il resto dell'applicazione, che deve rispettare questa checklist:

- Ogni pagina (tranne login e logout) è accessibile solo con `richiediRuolo("admin")`; `mario` (cliente) riceve «Accesso negato».
- `index.php` elenca i prodotti (miniatura, nome, categoria, prezzo, giacenza) con ricerca per nome (`q`), filtro per categoria (`categoria`) e paginazione da 8 righe; i filtri restano attivi quando si cambia pagina.
- `prodotto.php` è un'unica pagina per creare (senza parametri) e modificare (`?id=`) un prodotto, con validazione lato server (nome obbligatorio fino a 80 caratteri, descrizione fino a 200, prezzo maggiore di zero, giacenza intera non negativa, categoria esistente) e valori conservati in caso di errore.
- Il modulo permette di caricare un'immagine facoltativa, di sostituirla e di rimuoverla con una casella.
- `elimina.php` accetta solo POST, elimina il prodotto e la sua immagine; se il prodotto compare in `righe_ordine` mostra un messaggio chiaro invece di un errore.
- Dopo ogni operazione c'è un messaggio flash e un redirect.
- Il layout comune sta in `parti/testa.php` e `parti/coda.php`; le funzioni sulle immagini stanno in `immagini.php`.

Usa le tabelle `prodotti` (con la colonna `immagine`, che può essere `NULL`) e `categorie`; la cartella `immagini/` è già presente.

## Obiettivo

Mettere insieme ricerca, paginazione, CRUD con query preparate, upload di immagini e controllo dei ruoli in un'applicazione completa.

## Anteprima

```
index.php
+--------------------------------------------------------------------+
| Prodotti | Nuovo prodotto | Esci (admin)                           |
| [ Prodotto «Webcam» creato. ]                                      |
| Cerca [ mon        ] Categoria [ Tutte v ] [ Cerca ]               |
| 3 prodotti - pagina 1 di 1                                         |
|       Prodotto     Categoria     Prezzo  Giacenza                   |
| [foto] Monitor 24" Periferiche  € 149,00   12   Modifica [Elimina] |
| [    ] Mouse USB   Periferiche  €  12,90   40   Modifica [Elimina] |
| [Precedente] 1 2 3 [Successiva]                                    |
+--------------------------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `login.php`, `logout.php` | forniti |
| `parti/testa.php`, `parti/coda.php` | apertura e chiusura della pagina, menu (da scrivere) |
| `immagini.php` | `salvaImmagine()` e `eliminaImmagine()` (da scrivere) |
| `index.php` | elenco con ricerca, filtro e paginazione (da scrivere) |
| `prodotto.php` | creazione e modifica (da scrivere) |
| `elimina.php` | eliminazione, solo POST (da scrivere) |
| `immagini/` | cartella delle immagini: deve essere scrivibile dal server web |

## Descrizione

### Come si combinano i pezzi

Nessuna tecnica è nuova: ognuna l'hai già incontrata. Qui conta l'organizzazione. Il **layout comune** (menu, `<head>`, titolo) sta in `parti/testa.php`, che riceve `$titolo` e `$pagina` (la voce di menu da evidenziare) e stampa anche i messaggi flash; `parti/coda.php` chiude `main`, `body` e `html`. La **ricerca** e la **paginazione** di `index.php` vengono dalla [paginazione](39-paginazione.md); l'accesso dal [login con il database](44-login-db.md) e dal [pannello admin](46-pannello-admin.md); l'upload dagli [esercizi 49 e 50](49-upload-sicuro.md).

### Un solo file per creare e modificare

`prodotto.php` parte da un array `$prodotto` con valori vuoti. Se arriva `?id=` carica la riga dal database (se non esiste risponde 404). Il modulo lavora sull'array in entrambi i casi, e al salvataggio si sceglie `INSERT` o `UPDATE` in base a `$id > 0`. Così la validazione e il modulo si scrivono una volta sola.

```php
if ($id > 0) {
    $dati["id"] = $id;
    $pdo->prepare("UPDATE prodotti SET nome = :nome, ... WHERE id = :id")->execute($dati);
} else {
    $pdo->prepare("INSERT INTO prodotti (nome, ...) VALUES (:nome, ...)")->execute($dati);
}
```

### L'ordine delle operazioni nel salvataggio

Con un file e una riga del database da tenere coerenti l'ordine è importante:

1. Si valida il modulo; solo se non ci sono errori si tocca il file.
2. Si salva la nuova immagine (`salvaImmagine()` restituisce il nome del file oppure una stringa che comincia con `!` e contiene l'errore).
3. Si esegue l'`INSERT` o l'`UPDATE`.
4. Solo a database aggiornato si elimina la vecchia immagine.

Se il passo 3 fallisce, il file appena caricato non serve a nessuno: lo si elimina nel `catch` prima di rilanciare l'eccezione, per non lasciare file orfani. Allo stesso modo, se la validazione fallisce dopo che l'immagine è stata salvata, il nuovo file va eliminato.

```php
} catch (PDOException $e) {
    eliminaImmagine($immagineNuova);
    throw $e;
}
```

!!! warning "Dopo un errore l'utente deve riscegliere il file"
    Il browser non ripropone un campo `file` già compilato: se il modulo viene rimandato con degli errori, l'immagine va selezionata di nuovo. Per questo la pagina salva il file solo quando gli altri campi sono validi.

### Eliminare un prodotto già venduto

La tabella `righe_ordine` ha una chiave esterna verso `prodotti`: eliminare un prodotto presente in un ordine fa scattare l'errore MySQL **1451**, che arriva a PHP come `PDOException` con `$e->errorInfo[1] === 1451`. Si intercetta solo quel codice e si mostra un messaggio comprensibile (lo storico degli ordini non si cancella, si può azzerare la giacenza); gli altri errori si rilanciano con `throw $e`.

### I filtri nei link di paginazione

Se i link cambiassero pagina senza ricordare `q` e `categoria`, la ricerca si perderebbe al primo clic. Una funzione costruisce l'indirizzo con `http_build_query`, che si occupa anche di codificare i caratteri speciali:

```php
function link_pagina(int $n, string $q, int $categoria): string
{
    return "index.php?" . http_build_query(["q" => $q, "categoria" => $categoria, "pagina" => $n]);
}
```

## Suggerimenti

- Costruisci l'esercizio a passi: prima `index.php` senza filtri, poi ricerca e paginazione, poi `prodotto.php` senza immagini, infine l'upload.
- `LIMIT` e `OFFSET` richiedono `bindValue` con `PDO::PARAM_INT`; per i filtri usa lo stesso ciclo con `bindValue` anche per i parametri del `WHERE`.
- Il numero di pagina va limitato tra 1 e l'ultima: `max(1, min($numeroPagine, ...))`.
- Il prezzo può arrivare con la virgola: sostituiscila con il punto prima di validarlo.
- Elimina con un modulo POST e `confirm()` in JavaScript, non con un link: un link `elimina.php?id=3` si può attivare per sbaglio o da un'altra pagina.
- Estensione: aggiungi l'ordinamento cliccando sulle intestazioni delle colonne, accettando solo i nomi di colonna di una whitelist.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/index.php"
    ```
=== "prodotto.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/prodotto.php"
    ```
=== "elimina.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/elimina.php"
    ```
=== "immagini.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/immagini.php"
    ```
=== "parti/testa.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/parti/testa.php"
    ```
=== "parti/coda.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/parti/coda.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/login.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Gestionale-negozio/logout.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**, e la cartella `immagini/` deve essere scrivibile dal server web: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Gestionale-negozio/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
