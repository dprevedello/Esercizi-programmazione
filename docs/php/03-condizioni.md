# Condizioni

Scrivi uno script PHP che legga un voto intero da 0 a 10 e, se è valido, stampi il giudizio corrispondente (sotto 4 «Gravemente insufficiente», 4-5 «Insufficiente», 6 «Sufficiente», 7 «Discreto», 8 «Buono», 9-10 «Ottimo») e l'esito «promosso» o «da recuperare». Per un voto fuori dall'intervallo deve stampare «Voto non valido.».

## Obiettivo

Scegliere tra più alternative con `if`, `elseif`, `match` e l'operatore ternario.

## Descrizione

### `if`, `elseif`, `else`

La struttura **`if`** esegue un blocco solo se la condizione è vera; `elseif` aggiunge altre condizioni e `else` copre tutti gli altri casi. Le condizioni si combinano con `&&` (e), `||` (o) e `!` (non).

```php
if ($voto < 0 || $voto > 10) {
    echo "Voto non valido.\n";
} elseif ($voto >= 6) {
    echo "Promosso\n";
} else {
    echo "Da recuperare\n";
}
```

### `match`

L'espressione **`match`** confronta un valore con una serie di casi e **restituisce** il risultato del primo che corrisponde, quindi si può assegnare direttamente a una variabile. Scritta con `match (true)`, permette di usare condizioni qualsiasi (come `$voto < 4`) invece di valori esatti. Il ramo `default` copre tutti gli altri casi.

```php
$giudizio = match (true) {
    $voto < 6   => "Insufficiente",
    $voto === 6 => "Sufficiente",
    default     => "Buono",
};
```

!!! note "E `switch`?"
    Esiste anche l'istruzione **`switch`**, simile a quella di C e Java (con `case` e `break`). `match` è più compatto e non richiede `break`, quindi in PHP moderno è spesso preferito.

### Operatore ternario e operatore `??`

L'**operatore ternario** `condizione ? valore_se_vera : valore_se_falsa` è un `if` scritto in una riga. L'operatore **`??`** (null coalescing) usa il valore di sinistra se la variabile esiste e non è `null`, altrimenti quello di destra: tornerà utilissimo con i dati dei form (`$_POST["nome"] ?? ""`).

## Suggerimenti

- Controlla la validità del voto per primo: così il resto del codice può assumere che il numero sia corretto.
- Con `match (true)` l'ordine dei rami conta: il primo vero vince, quindi metti prima i casi più specifici o le soglie più basse.
- Prova il programma con 3, 4, 6, 9, 10, 11 e -1.
- Estensione: stampa un incoraggiamento diverso per ogni giudizio.

## Soluzione

```php
--8<-- "PHP/Condizioni/index.php"
```

<div class="oc-embed"
     data-path="PHP/Condizioni/index.php"
     data-lang="php"
     data-stdin="7\n"
     data-height="400"
     data-autorun="true">
</div>
