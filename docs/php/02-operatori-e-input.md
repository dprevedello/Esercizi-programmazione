# Operatori e input

Scrivi uno script PHP che legga da tastiera due numeri interi e stampi somma, differenza, prodotto, divisione, divisione intera, resto e potenza (primo numero elevato al secondo). Se il secondo numero è zero, lo script deve evitare la divisione e segnalarlo.

## Obiettivo

Leggere dati da tastiera, convertirli in numeri e usare gli operatori aritmetici e di confronto di PHP.

## Descrizione

### Leggere da tastiera: `fgets(STDIN)`

In uno script eseguito da console, **`fgets(STDIN)`** legge una riga digitata dall'utente. La riga contiene anche il carattere di a capo finale, che si toglie con **`trim()`**. Il risultato è sempre una stringa: per ottenere un numero si usa un **cast**, cioè una conversione esplicita scritta davanti al valore.

```php
$a = (int) trim(fgets(STDIN));    // "17\n" diventa 17
```

### Operatori aritmetici

Oltre a `+ - * /` esistono `%` (resto della divisione), `**` (potenza) e la funzione `intdiv()` per la divisione tra interi che scarta i decimali. L'operatore `/` restituisce invece un numero decimale se la divisione non è esatta.

| Espressione | Risultato |
|-------------|-----------|
| `17 / 5` | `3.4` |
| `intdiv(17, 5)` | `3` |
| `17 % 5` | `2` |
| `2 ** 10` | `1024` |

### `==` e `===`

L'operatore **`==`** confronta solo il **valore** (convertendo i tipi se serve), mentre **`===`** confronta valore **e tipo**. Per questo `"17" == 17` è vero ma `"17" === 17` è falso. Come regola generale, usa `===`: evita sorprese.

## Suggerimenti

- Controlla il divisore **prima** di dividere: in PHP 8 la divisione per zero lancia un errore fatale.
- `var_export($valore, true)` trasforma un booleano nel testo `true` o `false`, altrimenti `echo` stamperebbe `1` o niente.
- Dopo ogni lettura, stampa il valore ricevuto (`echo $a . "\n";`): in un terminale lo vedi già perché lo hai digitato tu, ma nel sandbox online serve per capire cosa è stato letto.
- Estensione: aggiungi gli operatori composti (`+=`, `-=`, `*=`) e gli operatori `++` e `--`.

## Soluzione

```php
--8<-- "PHP/Operatori-e-input/index.php"
```

<div class="oc-embed"
     data-path="PHP/Operatori-e-input/index.php"
     data-lang="php"
     data-stdin="17\n5\n"
     data-height="500"
     data-autorun="true">
</div>

!!! info "Simulazione nel sandbox"
    OneCompiler non permette di digitare mentre il programma gira: i due numeri (`17` e `5`) sono **precaricati** nel campo di input. In un terminale reale sarai tu a digitarli, uno per riga.
