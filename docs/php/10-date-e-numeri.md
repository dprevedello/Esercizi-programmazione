# Date e numeri

Scrivi uno script PHP che stampi un preventivo con la data di emissione (4 ottobre 2026) e la scadenza a 30 giorni, tre voci (descrizione, prezzo, quantità), l'imponibile, l'IVA al 22% e il totale, formattando gli importi alla maniera italiana (`1.202,90`). Mostra infine alcuni arrotondamenti e la rata di un pagamento in tre quote.

## Obiettivo

Formattare numeri e date con `number_format`, `date` e `strtotime`, e arrotondare con `round`, `floor` e `ceil`.

## Descrizione

### Formattare i numeri

**`number_format(numero, decimali, sep_decimale, sep_migliaia)`** restituisce un numero come testo, con il numero di decimali richiesto e i separatori scelti: `number_format(1202.9, 2, ",", ".")` dà `1.202,90`. Si usa solo per **mostrare** un importo: i calcoli vanno fatti sui numeri veri.

### Arrotondare

**`round`** arrotonda al valore più vicino (con i decimali richiesti), **`floor`** per difetto e **`ceil`** per eccesso. Per arrotondare per eccesso al centesimo si moltiplica per 100, si usa `ceil` e si divide di nuovo per 100.

### Date e orari

PHP rappresenta un istante come **timestamp**: il numero di secondi trascorsi dal 1° gennaio 1970. **`mktime(ora, minuti, secondi, mese, giorno, anno)`** costruisce un timestamp, **`strtotime("+30 days", $t)`** lo sposta in avanti, **`date("d/m/Y", $t)`** lo trasforma in testo con il formato desiderato. Senza il secondo argomento, `date()` e `strtotime()` usano **l'istante attuale**. Il fuso orario si imposta con `date_default_timezone_set("Europe/Rome")`.

| Lettera in `date()` | Significato |
|---------------------|-------------|
| `d` / `m` / `Y` | giorno / mese / anno a 4 cifre |
| `H` / `i` / `s` | ore / minuti / secondi |
| `N` | giorno della settimana (1 = lunedì) |

## Suggerimenti

- Usa una data fissa (`mktime`) per ottenere sempre lo stesso risultato mentre provi lo script; sostituiscila con `time()` per usare il momento attuale.
- Calcola l'IVA come `imponibile * aliquota / 100` e il totale come somma dei due.
- `printf("%-20s %2d x %8s", ...)` aiuta a incolonnare il testo: `%-20s` è un testo allineato a sinistra in 20 caratteri, `%2d` un intero in 2 caratteri.
- Estensione: stampa anche il giorno della settimana della scadenza con `date("N", ...)` e un array di nomi dei giorni.

## Soluzione

```php
--8<-- "PHP/Date-e-numeri/index.php"
```

<div class="oc-embed"
     data-path="PHP/Date-e-numeri/index.php"
     data-lang="php"
     data-height="550"
     data-autorun="true">
</div>
