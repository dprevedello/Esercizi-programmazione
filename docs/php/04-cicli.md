# Cicli

Scrivi uno script PHP che legga un numero intero `n` e stampi: la tabellina di `n`, un triangolo di asterischi di `n` righe, il conto alla rovescia da `n` a 1 seguito da «Via!», l'elenco di tre colori scorrendo un array e la somma dei numeri da 1 a `n`.

## Obiettivo

Usare i quattro cicli di PHP (`for`, `while`, `do-while`, `foreach`) per ripetere operazioni.

## Descrizione

### `for` e `for` annidati

Il ciclo **`for`** si usa quando si sa quante volte ripetere: ha inizializzazione, condizione e aggiornamento. Mettendo un ciclo dentro un altro (**cicli annidati**) si costruiscono figure su più righe: il ciclo esterno gestisce le righe, quello interno i caratteri di ogni riga.

```php
for ($i = 1; $i <= 10; $i++) {
    echo "$i\n";
}
```

### `while` e `do-while`

Il ciclo **`while`** controlla la condizione **prima** di ogni giro (può non eseguirsi mai). Il **`do-while`** la controlla **dopo**, quindi il corpo viene eseguito almeno una volta. Ricorda di aggiornare la variabile nel corpo, altrimenti il ciclo non finisce mai.

### `foreach`

Il ciclo **`foreach`** scorre tutti gli elementi di un **array** (un elenco di valori, che vedrai meglio più avanti) senza bisogno di un contatore. È il ciclo più usato in PHP, soprattutto con i dati letti dai database.

```php
$colori = ["rosso", "verde", "blu"];
foreach ($colori as $colore) {
    echo "- $colore\n";
}
```

## Suggerimenti

- Dentro le virgolette doppie puoi scrivere direttamente `"$n x $i = ..."`, ma i calcoli vanno concatenati: `" = " . ($n * $i)`.
- Per il triangolo, nella riga numero `riga` servono `riga` asterischi.
- `break` interrompe un ciclo, `continue` salta al giro successivo.
- Estensione: stampa il triangolo capovolto, oppure una piramide centrata usando `str_repeat(" ", ...)`.

## Soluzione

```php
--8<-- "PHP/Cicli/index.php"
```

<div class="oc-embed"
     data-path="PHP/Cicli/index.php"
     data-lang="php"
     data-stdin="5\n"
     data-height="600"
     data-autorun="true">
</div>
