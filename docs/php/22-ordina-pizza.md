# Ordina la tua pizza

Il modulo `index.html` (già pronto) invia a `ordine.php` i campi `dimensione` (`piccola`, `media`, `grande`), `impasto` (`classico`, `integrale`, `senzaglutine`), `extra[]` (zero o più tra `prosciutto`, `funghi`, `olive`, `salame`), `quantita` e la casella `consegna`. Scrivi `ordine.php` in modo che calcoli e mostri il riepilogo con il totale: prezzo della dimensione (5, 7 o 9 euro) più il supplemento dell'impasto (0, 1 o 2 euro) più 1,50 euro per ogni ingrediente extra, moltiplicato per la quantità, più 2 euro se c'è la consegna.

## Obiettivo

Gestire tutti i tipi di campo di un modulo, in particolare le caselle multiple che PHP riceve come array.

## Anteprima

```
+------------------------------------------+
| Riepilogo ordine                         |
| +--------------------------------------+ |
| | 2 pizza/e grande, impasto integrale. | |
| | Ingredienti extra:                   | |
| |   • Funghi                           | |
| |   • Olive                            | |
| | Consegna: a domicilio                | |
| | Totale: € 28,00                      | |
| +--------------------------------------+ |
| ← Nuovo ordine                           |
+------------------------------------------+
```

## Descrizione

### Le caselle multiple: `name="extra[]"`

Se più caselle (`checkbox`) hanno lo stesso `name` seguito da parentesi quadre, PHP le raccoglie in un **array**: `$_POST["extra"]` contiene i valori delle sole caselle spuntate.

```html
<input type="checkbox" name="extra[]" value="funghi">
<input type="checkbox" name="extra[]" value="olive">
```

```php
$extra = $_POST["extra"] ?? [];   // ["funghi", "olive"] oppure [] se nessuna è spuntata
```

Se **nessuna** casella è spuntata il campo non viene inviato affatto: senza il `?? []` si avrebbe un avviso.

### Radio e menu

I pulsanti **radio** con lo stesso `name` sono alternativi: se ne sceglie uno solo e PHP riceve il suo `value`. Anche per i `<select>` si riceve il `value` dell'opzione scelta.

### Non fidarsi mai dei valori ricevuti

I `value` arrivano dal browser, ma chiunque può inviarne altri. Per questo i prezzi **non** si leggono dal modulo: si tengono in array del server (`$prezziDimensione = ["piccola" => 5.00, ...]`) e dal modulo si prende solo la **chiave**, verificando che esista. Per gli extra, `array_intersect($extra, array_keys($ingredientiExtra))` scarta qualunque valore non previsto.

## Suggerimenti

- Controlla con `is_array($_POST["extra"])` prima di usare l'array: un malintenzionato potrebbe inviare un testo al suo posto.
- La quantità si converte con `(int)` e va limitata (qui da 1 a 10).
- `count($extra)` dà il numero di ingredienti: moltiplicalo per il prezzo di uno.
- Mostra «Nessun ingrediente extra» quando l'array è vuoto.
- Estensione: aggiungi una casella «Pizza a metà» che dimezza il prezzo degli extra.

## Soluzione

=== "ordine.php"
    ```php
    --8<-- "PHP/Ordina-pizza/ordine.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Ordina-pizza/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: OneCompiler esegue solo script da riga di comando e non può inviare moduli. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
