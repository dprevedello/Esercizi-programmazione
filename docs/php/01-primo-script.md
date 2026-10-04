# Primo script PHP

Scrivi uno script PHP che memorizzi in quattro variabili il tuo nome, la tua età, la tua città e la tua altezza, poi stampi una frase di presentazione, l'anno in cui compirai 100 anni e il tipo di ciascuna variabile.

## Obiettivo

Scrivere il primo script PHP: dichiarare variabili di tipo diverso, stamparle con `echo` e osservare i tipi che PHP assegna da solo.

## Descrizione

### Il tag `<?php`

Un file PHP contiene codice solo tra il tag di apertura **`<?php`** e (facoltativamente) il tag di chiusura `?>`. In un file fatto solo di codice PHP, come questi script, il tag di chiusura si omette. Ogni istruzione termina con il **punto e virgola** `;`.

```php
<?php
echo "Ciao dal server!\n";
```

In questa sottosezione l'output è **testo semplice** (una console), quindi si va a capo con `\n`. Dalla sottosezione 2 in poi il testo diventerà una pagina HTML e l'a capo si farà con i tag.

### Variabili e tipi

Una **variabile** inizia sempre con il simbolo `$` e non va dichiarata con un tipo: è PHP a deciderlo in base al valore assegnato. I tipi principali sono `string` (testo), `int` (intero), `float` (decimale) e `bool` (vero/falso). Il tipo si legge con `gettype()` e si ispeziona con `var_dump()`.

```php
$eta = 17;            // int
$altezza = 1.68;      // float
$maggiorenne = $eta >= 18;   // bool: false
```

### Stringhe: apici doppi, apici singoli, concatenazione

Dentro le **virgolette doppie** `"..."` PHP sostituisce le variabili con il loro valore (**interpolazione**) e interpreta sequenze speciali come `\n`. Dentro gli **apici singoli** `'...'` il testo resta esattamente com'è. Il punto `.` **concatena** (unisce) due stringhe.

```php
echo "Ho $eta anni\n";       // Ho 17 anni
echo 'Ho $eta anni';         // Ho $eta anni
echo "Citta: " . $citta;     // concatenazione
```

## Suggerimenti

- Usa nomi di variabile chiari (`$citta`, non `$c`): in PHP maiuscole e minuscole contano, quindi `$Citta` e `$citta` sono due variabili diverse.
- Per usare un calcolo dentro una frase, mettilo tra parentesi e concatenalo: `"... " . ($anno + 5) . " ..."`.
- Per stampare il simbolo `$` dentro le virgolette doppie, anteponi una barra: `\$`.
- Prova a cambiare il valore di una variabile (per esempio `$eta = "diciassette";`) e osserva come cambia il risultato di `gettype()`.

## Soluzione

```php
--8<-- "PHP/Primo-script/index.php"
```

<div class="oc-embed"
     data-path="PHP/Primo-script/index.php"
     data-lang="php"
     data-height="450"
     data-autorun="true">
</div>
