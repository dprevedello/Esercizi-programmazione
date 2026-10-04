# Sito con include

Realizza un piccolo sito di tre pagine (`index.php`, `chi-siamo.php`, `contatti.php`) per il «Coding Club» della scuola. L'intestazione (con il menu di navigazione, dove la voce della pagina corrente è evidenziata) e il piè di pagina (con l'anno corrente) devono essere scritti **una sola volta**, in due file separati nella cartella `parti/`, e inclusi dalle tre pagine.

## Obiettivo

Evitare di ripetere lo stesso codice in più pagine, includendo file comuni con `require`.

## Anteprima

```
+--------------------------------------------------+
| Home   Chi siamo   Contatti                      |  <- parti/header.php (menu)
| ====                                             |     voce attiva sottolineata
+--------------------------------------------------+
| Benvenuti nel Coding Club                        |  <- contenuto di index.php
| Un gruppo di studenti che ...                    |
|                                                  |
| © 2026 Coding Club – Istituto Tecnico ...        |  <- parti/footer.php
+--------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `parti/header.php` | apre `<html>`, `<head>`, il menu e `<main>` |
| `parti/footer.php` | chiude `<main>` e `<body>`, scrive l'anno |
| `index.php`, `chi-siamo.php`, `contatti.php` | impostano le variabili, includono le parti e scrivono il proprio contenuto |

## Descrizione

### `include` e `require`

Le istruzioni **`include`** e **`require`** inseriscono nel punto in cui si trovano il contenuto di un altro file PHP, che viene eseguito come se fosse scritto lì. La differenza è nel comportamento se il file non esiste: `include` produce solo un avviso e continua, `require` si ferma con un errore. Per le parti **indispensabili** come intestazione e piè di pagina si usa `require`; la variante `require_once` evita di includere due volte lo stesso file.

```php
require __DIR__ . "/parti/header.php";
```

`__DIR__` è la cartella del file corrente: il percorso funziona anche se la pagina viene aperta da una cartella diversa.

### Passare dati al file incluso

Il file incluso **vede le variabili** già definite dalla pagina, perché è come se il suo codice fosse scritto lì. È il modo più semplice per personalizzare l'intestazione: ogni pagina definisce `$titolo` e `$attiva` **prima** di includere `header.php`.

```php
<?php
$titolo = "Chi siamo";
$attiva = "chi-siamo.php";
require __DIR__ . "/parti/header.php";
?>
```

### Un menu generato da un array

Il menu è un array associativo `file => voce` e un `foreach` genera i link. La voce con il nome del file uguale a `$attiva` riceve la classe `attiva`.

## Suggerimenti

- Il file `parti/header.php` apre dei tag (`<main>`) che chiude solo `footer.php`: tienili sempre in coppia.
- Nell'`<title>` usa `<?= $titolo ?>` per avere un titolo diverso in ogni pagina.
- `date("Y")` restituisce l'anno corrente per il copyright.
- Prova a cambiare una voce del menu in `header.php`: il cambiamento si vede subito su tutte e tre le pagine.
- Estensione: aggiungi una quarta pagina e una nuova voce di menu.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Sito-con-include/index.php"
    ```
=== "chi-siamo.php"
    ```php
    --8<-- "PHP/Sito-con-include/chi-siamo.php"
    ```
=== "contatti.php"
    ```php
    --8<-- "PHP/Sito-con-include/contatti.php"
    ```
=== "parti/header.php"
    ```php
    --8<-- "PHP/Sito-con-include/parti/header.php"
    ```
=== "parti/footer.php"
    ```php
    --8<-- "PHP/Sito-con-include/parti/footer.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
