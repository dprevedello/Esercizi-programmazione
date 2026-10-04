# Pagina dinamica

Crea una pagina `index.php` che, usando l'ora e la data del server, mostri un saluto adatto («Buongiorno» fino a mezzogiorno, «Buon pomeriggio» fino alle 18, «Buonasera» dopo), la data di oggi scritta per esteso (per esempio «domenica 4 ottobre 2026»), l'ora corrente e un messaggio diverso se è notte, se è fine settimana o se è un giorno qualsiasi. Aggiungi un conto alla rovescia da 3 a 1 generato con un ciclo.

## Obiettivo

Mescolare codice PHP e HTML nello stesso file, in modo che la pagina cambi a seconda dei dati calcolati dal server.

## Anteprima

```
+--------------------------------------------+
| Buonasera, visitatore!                     |   <- <h1> con il saluto calcolato
|                                            |
| +----------------------------------------+ |
| | Oggi è domenica 4 ottobre 2026.        | |   <- data scritta per esteso
| | Sul server sono le 21:38.              | |
| +----------------------------------------+ |
|                                            |
| [ Buon lavoro e buono studio. ]            |   <- messaggio scelto da if/elseif
|                                            |
| Conto alla rovescia                        |
|  • 3  • 2  • 1  • Via!                     |   <- <li> generati da un ciclo for
|                                            |
| © 2026 – pagina generata da PHP            |
+--------------------------------------------+
```

## Descrizione

### PHP dentro l'HTML

Un file `.php` è un normale documento HTML in cui puoi aprire una zona di codice con **`<?php`** e chiuderla con **`?>`**. Il server esegue il codice e **sostituisce** ogni blocco con il testo che produce: il browser riceve solo HTML. Per questo, nel browser, «Visualizza sorgente» non mostra mai il codice PHP.

```php
<?php $nome = "Giulia"; ?>
<h1>Ciao, <?php echo $nome; ?>!</h1>
```

### La scorciatoia `<?= ?>`

Per stampare un singolo valore esiste la forma abbreviata **`<?= ... ?>`**, equivalente a `<?php echo ... ?>`: nel codice precedente basta scrivere `<h1>Ciao, <?= $nome ?>!</h1>`.

### Sintassi alternativa per le strutture di controllo

Quando `if` e cicli racchiudono molto HTML, le graffe diventano difficili da seguire. Per questo PHP offre la **sintassi alternativa**: i due punti `:` al posto della graffa aperta e le parole **`endif`**, **`endfor`**, **`endforeach`** al posto della graffa chiusa.

```php
<?php if ($ora < 12): ?>
    <p>Buongiorno!</p>
<?php else: ?>
    <p>Buon proseguimento!</p>
<?php endif; ?>
```

## Suggerimenti

- Calcola tutte le variabili in un blocco PHP **all'inizio** del file e usa poi solo `<?= ?>` nell'HTML: la pagina resta leggibile.
- `date("H")` restituisce l'ora (da `00` a `23`) come testo: convertila con `(int)` prima di confrontarla. `date("w")` dà il giorno della settimana (0 = domenica), `date("N")` lo dà da 1 (lunedì) a 7 (domenica), `date("n")` il mese come numero.
- Per scrivere giorno e mese in italiano usa due array di nomi e il numero come indice.
- Imposta il fuso orario con `date_default_timezone_set("Europe/Rome")`, altrimenti l'ora potrebbe essere quella di un altro paese.
- Estensione: cambia il colore dello sfondo a seconda del momento della giornata.

## Soluzione

```php
--8<-- "PHP/Pagina-dinamica/index.php"
```

!!! warning "Esegui in locale"
    Le pagine PHP richiedono un **server web con PHP**: OneCompiler esegue solo script da riga di comando, quindi qui non c'è il blocco «Prova online». Copia la cartella `PHP/` nella cartella pubblica del tuo server (per esempio `htdocs` in XAMPP) e apri la pagina dal browser. Le istruzioni sono nella pagina [Eseguire PHP in locale](index.md#eseguire-php-in-locale). Il foglio di stile `includes/stile.css` è già pronto e non va modificato.
