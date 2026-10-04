# Paginazione dei risultati

Nel database `negozio` la tabella `prodotti` ha 16 righe, troppe per una sola pagina. Scrivi `index.php`, che mostra i prodotti (nome, categoria dalla tabella `categorie`, prezzo) cinque alla volta. La pagina richiesta arriva con il parametro `?pagina=N`; il parametro `?ordine=` accetta `nome` (predefinito) oppure `prezzo`. Sotto la tabella mostra l'intervallo visualizzato («Prodotti 6–10 di 16, pagina 2 di 4») e i link «Precedente», un numero per ogni pagina (quella corrente in grassetto, senza link) e «Successiva»; cambiando ordinamento si torna alla pagina 1, cambiando pagina l'ordinamento resta quello scelto. Un numero di pagina fuori intervallo (0, 99, `abc`) non deve produrre errori.

## Obiettivo

Leggere dal database solo le righe della pagina richiesta, con `LIMIT`/`OFFSET`, e costruire i link di navigazione.

## Anteprima

```
+--------------------------------------------------------+
| Prodotti                                               |
| Ordina per: nome | prezzo                              |
|                                                        |
| Prodotto              Categoria       Prezzo           |
| Mouse ottico wireless Periferiche    € 19,90           |
| Processore 8 core     Componenti PC  € 229,90          |
| ...                                                    |
| Prodotti 6–10 di 16 (pagina 2 di 4)                    |
| ← Precedente  1 [2] 3 4  Successiva →                  |
+--------------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `includes/connessione.php`, `includes/stile.css` | forniti |
| `index.php` | conteggio, query paginata e link (da scrivere) |

## Descrizione

### Quante pagine?

Per sapere quante pagine servono bisogna conoscere il totale delle righe. Lo fornisce una query separata con `COUNT(*)`; `fetchColumn()` restituisce direttamente il primo valore della prima riga:

```php
$perPagina    = 5;
$totale       = (int) $pdo->query("SELECT COUNT(*) FROM prodotti")->fetchColumn();
$numeroPagine = max(1, (int) ceil($totale / $perPagina));
```

`ceil()` arrotonda per eccesso (16 prodotti / 5 = 3,2, cioè 4 pagine); `max(1, ...)` garantisce almeno una pagina anche con la tabella vuota.

### Tenere la pagina nei limiti

Il numero di pagina arriva dall'indirizzo, quindi è un dato dell'utente: va convertito e riportato in un intervallo valido.

```php
$pagina = (int) ($_GET["pagina"] ?? 1);
$pagina = max(1, min($numeroPagine, $pagina));
```

`(int) "abc"` vale 0, e `max(1, ...)` lo porta a 1; `99` viene ridotto a `$numeroPagine` da `min()`.

### LIMIT e OFFSET

`LIMIT` dice quante righe leggere, `OFFSET` quante saltarne. Per la pagina *n*:

```
offset = (pagina - 1) * perPagina
```

Pagina 1: salta 0 righe; pagina 2: salta 5; pagina 3: salta 10.

### I numeri vanno passati come interi

Con `execute(["limite" => 5, "offset" => 5])` PDO invia i valori come **stringhe**, e MySQL rifiuta `LIMIT '5' OFFSET '5'` con un errore di sintassi (`You have an error in your SQL syntax ... near ''5' OFFSET '5''`). Si usa quindi `bindValue()` indicando il tipo:

```php
$stmt->bindValue(":limite", $perPagina, PDO::PARAM_INT);
$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
$stmt->execute();
```

!!! warning "Non concatenare"
    Anche se `$pagina` è già un intero, resta buona abitudine usare i segnaposto: la regola «nessun valore dentro la stringa SQL» deve valere sempre, senza eccezioni da ricordare.

### Ordinamento e link

Il nome della colonna di `ORDER BY` non si parametrizza: come nella [ricerca dei prodotti](38-ricerca-prodotti.md) si sceglie da un elenco di valori ammessi. Per costruire i link conservando l'ordinamento si usa `http_build_query()`, che compone la stringa `pagina=2&ordine=prezzo` codificando i caratteri speciali:

```php
function link_pagina(int $n, string $ordine): string
{
    return "index.php?" . http_build_query(["pagina" => $n, "ordine" => $ordine]);
}
```

## Suggerimenti

- Il primo prodotto mostrato è `$offset + 1`, l'ultimo `$offset + count($prodotti)`.
- Mostra «Precedente» solo se `$pagina > 1` e «Successiva» solo se `$pagina < $numeroPagine`.
- Aggiungi un secondo criterio di ordinamento (per esempio `p.id`) se più prodotti hanno lo stesso prezzo: senza un ordine totale le pagine potrebbero sovrapporsi.
- Prova gli indirizzi `?pagina=0`, `?pagina=99`, `?pagina=abc` e `?ordine=xyz`.
- Estensione: rendi configurabile `$perPagina` (5, 10, 20) con un parametro, ammettendo solo questi valori.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Paginazione/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Paginazione/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
