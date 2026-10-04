# Pagine con parametri

Il file `dati.php` (già pronto, non modificarlo) contiene un array `$corsi` con quattro corsi estivi. Scrivi `index.php` in modo che: senza parametri mostri l'elenco dei corsi, ciascuno con un link; con `?id=3` mostri titolo, descrizione, durata e livello del corso numero 3 con un link per tornare all'elenco; con un id inesistente o non numerico mostri «Il corso numero N non esiste.» e risponda con codice HTTP 404.

## Obiettivo

Leggere un parametro dall'indirizzo della pagina (`?id=...`) tramite `$_GET` e usarlo per scegliere cosa mostrare.

## Anteprima

```
Senza parametri                      Con index.php?id=3
+---------------------------------+  +---------------------------------+
| Corsi estivi di informatica     |  | Corsi estivi di informatica     |
|                                 |  |                                 |
|  • Python da zero (20 ore)      |  | +-----------------------------+ |
|  • Siti web con HTML e CSS ...  |  | | JavaScript nel browser      | |
|  • JavaScript nel browser ...   |  | | Eventi, DOM e un ...        | |
|  • PHP e database (36 ore)      |  | | Durata: 30 ore – Livello:...| |
|                                 |  | +-----------------------------+ |
|                                 |  | ← Torna all'elenco              |
+---------------------------------+  +---------------------------------+
```

## Descrizione

### La query string

Un indirizzo può trasportare dati dopo il punto interrogativo: `index.php?id=3` ha un parametro `id` con valore `3`. Più parametri si separano con `&`: `index.php?id=3&ordine=nome`. Questa parte dell'indirizzo si chiama **query string** ed è il modo più semplice per dire a una pagina cosa vuoi vedere. I link dell'elenco si costruiscono semplicemente scrivendo `href="index.php?id=<?= $codice ?>"`.

### L'array `$_GET`

PHP raccoglie i parametri della query string nell'array **`$_GET`**, un array associativo (le **superglobali** come questa sono disponibili ovunque, anche dentro le funzioni). Il valore è sempre una **stringa**, e il parametro può mancare del tutto: prima di usarlo si controlla con `isset` oppure si assegna un valore predefinito con `??`.

```php
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;
```

### Non fidarti dell'indirizzo

Chiunque può scrivere qualsiasi cosa dopo `?id=`. Il parametro va quindi **convertito** (`(int)`) e **verificato** (`array_key_exists($id, $corsi)`) prima di usarlo, rispondendo con un messaggio chiaro se non vale. Con **`http_response_code(404)`** si dichiara che la pagina richiesta non esiste: va chiamata **prima** di stampare qualunque HTML.

## Suggerimenti

- `(int) "abc"` vale `0`: un id non numerico finisce quindi in «non esiste».
- Lascia tutto in un solo file: un `if` seleziona tra elenco, dettaglio ed errore.
- La chiave dell'array `$corsi` è già il codice del corso.
- Estensione: aggiungi un parametro `?livello=Base` che filtri l'elenco.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Pagine-con-parametri/index.php"
    ```
=== "dati.php"
    ```php
    --8<-- "PHP/Pagine-con-parametri/dati.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP** (i parametri dell'indirizzo non esistono in OneCompiler): copia la cartella `PHP/` nella cartella pubblica del tuo server (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
