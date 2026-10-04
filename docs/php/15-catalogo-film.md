# Catalogo di film

Il file `dati.php` (già pronto) contiene un array `$film` con sei film. Realizza un sito di due pagine: `index.php` mostra il catalogo in una tabella (titolo, regista, anno, genere; righe alterne colorate), con i link per filtrare per genere (`?genere=Fantascienza`) e il numero di film mostrati; `film.php?id=N` mostra la scheda di un film (trama, regista, genere, durata in ore e minuti) oppure «Film non trovato» con codice 404. Le due pagine devono condividere intestazione e piè di pagina.

## Obiettivo

Mettere insieme array, `include`, `$_GET` e generazione di HTML in un piccolo sito di consultazione.

## Anteprima

```
index.php?genere=Fantascienza                film.php?id=2
+-------------------------------------+      +--------------------------------+
| Catalogo                            |      | Catalogo                       |
+-------------------------------------+      +--------------------------------+
| Catalogo film                       |      | Matrix (1999)                  |
| Genere: Tutti | Animazione | ...    |      | +----------------------------+ |
|                                     |      | | Un programmatore scopre ...| |
| Titolo        Regista      Anno ... |      | | Regia di Lana e Lilly ...  | |
| Blade Runner  Ridley Scott 1982 ... |      | +----------------------------+ |
| Matrix        Lana e Lilly 1999 ... |      | ← Torna al catalogo            |
| 2 film mostrati.                    |      +--------------------------------+
+-------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `dati.php` | l'array `$film` (fornito) |
| `parti/header.php`, `parti/footer.php` | intestazione e piè di pagina comuni |
| `index.php` | catalogo con filtro per genere |
| `film.php` | scheda del singolo film |

## Descrizione

### Elenco dei generi senza doppioni

Per costruire i link dei filtri servono i generi **una volta sola**. `array_column($film, "genere")` estrae tutti i generi, `array_unique()` toglie i doppioni e `sort()` li ordina. Passando il genere nel link conviene usare **`urlencode()`**, che trasforma spazi e simboli in una forma sicura per gli indirizzi.

### Filtrare un array

Il filtro si scrive con un `foreach` che copia in un nuovo array `$visibili` solo gli elementi che soddisfano la condizione (nessun filtro, oppure genere uguale a quello richiesto). Tutta la stampa lavora poi su `$visibili`, e `count($visibili)` dà il numero di film mostrati.

### Riutilizzare la logica del progetto

L'intestazione e il piè di pagina arrivano da due file inclusi, come nell'esercizio *Sito con include*; i dati da un file incluso; il parametro dall'array `$_GET`. Nessun concetto è nuovo: l'obiettivo è **organizzare** bene il codice.

!!! warning "Attenzione ai valori che arrivano dall'indirizzo"
    Il genere richiesto viene stampato nel messaggio «Nessun film per il genere…»: passalo prima da **`htmlspecialchars()`**, altrimenti chi costruisce un indirizzo malevolo potrebbe inserire HTML nella tua pagina. L'esercizio *Sicurezza dell'output* spiega nel dettaglio il perché.

## Suggerimenti

- Per la durata in ore e minuti usa `intdiv($minuti, 60)` e `$minuti % 60`.
- Controlla l'id in `film.php` come nell'esercizio precedente: converti con `(int)` e usa `array_key_exists`.
- Le righe alterne si ottengono con un contatore `$riga` incrementato a ogni giro.
- Estensione: aggiungi un parametro `?ordine=anno` per ordinare il catalogo con `usort`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Catalogo-film/index.php"
    ```
=== "film.php"
    ```php
    --8<-- "PHP/Catalogo-film/film.php"
    ```
=== "dati.php"
    ```php
    --8<-- "PHP/Catalogo-film/dati.php"
    ```
=== "parti/header.php"
    ```php
    --8<-- "PHP/Catalogo-film/parti/header.php"
    ```
=== "parti/footer.php"
    ```php
    --8<-- "PHP/Catalogo-film/parti/footer.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
