# Calcolatrice web

Scrivi `index.php`: una pagina che contiene un modulo con due campi di testo (`n1`, `n2`) e un menu a tendina (`operazione`) con le voci somma, differenza, prodotto, divisione e potenza, e che invia i dati **a sé stessa**. Quando riceve i dati deve mostrare il risultato come «12 + 5 = 17», segnalare «Inserisci due numeri validi.» se un campo non è numerico e «Non si può dividere per zero.» in caso di divisione per zero. Dopo il calcolo i campi devono conservare i valori inseriti.

## Obiettivo

Scrivere una pagina che mostra un modulo e, quando lo riceve compilato, ne elabora i dati: il tipico schema «form che invia a sé stesso».

## Anteprima

```
+----------------------------------+
| Calcolatrice                     |
| Primo numero                     |
| [ 12                           ] |
| Operazione                       |
| [ + (somma)                   v] |
| Secondo numero                   |
| [ 5                            ] |
| [ Calcola ]                      |
|                                  |
| [ 12 + 5 = 17 ]                  |  <- compare solo dopo l'invio
+----------------------------------+
```

## Descrizione

### Un modulo che invia a sé stesso

Se l'attributo `action` del modulo è il nome della stessa pagina, il file `index.php` viene richiesto due volte: la prima con **GET** (l'utente apre la pagina e vede il modulo vuoto), la seconda con **POST** (l'utente ha premuto il pulsante). Il codice PHP deve distinguere i due casi con `$_SERVER["REQUEST_METHOD"]`.

```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // il modulo è stato inviato: elabora i dati
}
```

### Controllare che siano numeri: `is_numeric`

**`is_numeric($valore)`** restituisce `true` se la stringa rappresenta un numero (`"12"`, `"3.5"`, `"-7"`) e `false` altrimenti. I dati del modulo sono testi, quindi il controllo va fatto **prima** di convertirli con `(float)`.

### Conservare i valori nei campi

Per non far svuotare i campi, si scrive il valore ricevuto nell'attributo `value` (sempre con `htmlspecialchars`). Per il menu a tendina si aggiunge l'attributo `selected` all'opzione scelta. Si vedrà meglio nell'esercizio *Prenotazione di un tavolo*.

### `match` per scegliere l'operazione

L'operazione si sceglie con `match ($operazione) { "+" => ..., "-" => ..., default => null }`, come visto nell'esercizio sulle condizioni.

## Suggerimenti

- La divisione per zero va controllata **prima** di eseguirla, altrimenti PHP lancia un errore.
- Usa `$_POST["n1"] ?? ""` per evitare avvisi la prima volta che la pagina viene aperta.
- Crea le opzioni del menu con un `foreach` su un array `simbolo => nome`.
- Estensione: aggiungi la radice quadrata (che usa un solo numero) e disabilita il secondo campo.

## Soluzione

```php
--8<-- "PHP/Calcolatrice-web/index.php"
```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
