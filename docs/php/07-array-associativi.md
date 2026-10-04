# Array associativi

Scrivi uno script PHP che usi un array associativo come rubrica telefonica (nome → numero) con i contatti Giulia, Marco e Sara. Aggiungi Luca, modifica il numero di Sara, verifica se Luca ed Elena sono in rubrica, elimina Giulia, ordina la rubrica per nome e stampala, poi mostra separatamente nomi e numeri e cerca il proprietario di un numero.

## Obiettivo

Usare array associativi (coppie chiave → valore) e scorrerli con `foreach`.

## Descrizione

### Chiavi di tipo testo

In un **array associativo** le chiavi non sono numeri progressivi ma **etichette** scelte da te, di solito stringhe. Si scrive con l'operatore **`=>`** (freccia). È il modo naturale per rappresentare un dato con più campi (una persona, un prodotto) o una tabella di corrispondenze.

```php
$rubrica = ["Giulia" => "333 1234567", "Marco" => "347 7654321"];
echo $rubrica["Marco"];          // 347 7654321
$rubrica["Luca"] = "331 4445566"; // aggiunge o sostituisce
```

### `isset`, `unset` e `foreach chiave => valore`

**`isset($array["chiave"])`** dice se una chiave esiste (e non è `null`); **`unset($array["chiave"])`** la elimina. Per scorrere tutte le coppie si scrive `foreach ($rubrica as $nome => $telefono)`.

### Ordinare per chiave o per valore

`ksort()` ordina per **chiave** e `asort()` per **valore**, mantenendo le associazioni; `sort()` invece le butterebbe via, perdendo le chiavi. Le funzioni `array_keys()` e `array_values()` estraggono solo le chiavi o solo i valori.

## Suggerimenti

- Leggere una chiave che non esiste produce un avviso («Undefined array key»): controlla prima con `isset` oppure usa `$rubrica["Elena"] ?? "non presente"`.
- `array_search($valore, $array)` restituisce la **chiave** del primo elemento con quel valore.
- Per ordinare in senso inverso esistono `krsort()` e `arsort()`.
- Estensione: stampa i contatti ordinati per numero di telefono con `asort()`.

## Soluzione

```php
--8<-- "PHP/Array-associativi/index.php"
```

<div class="oc-embed"
     data-path="PHP/Array-associativi/index.php"
     data-lang="php"
     data-height="500"
     data-autorun="true">
</div>
