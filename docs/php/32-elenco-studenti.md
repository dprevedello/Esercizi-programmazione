# Elenco degli studenti

Il database `scuola` e il file `includes/connessione.php` sono già pronti. Scrivi `index.php`: si collega con `connetti("scuola")`, legge dalla tabella `studenti` id, nome, cognome, data di nascita ed email ordinando per cognome e poi per nome, e li mostra in una tabella HTML con righe alternate. La data va scritta nel formato italiano `gg/mm/aaaa`. Sotto la tabella scrivi quanti studenti sono stati letti. Se la tabella è vuota, mostra invece un messaggio.

## Obiettivo

Leggere un insieme di righe dal database con `query()` e `fetchAll()` e trasformarle in una tabella HTML.

## Anteprima

```
+--------------------------------------------------------------+
| Elenco studenti                                              |
| #  Cognome   Nome    Nato il     Email                       |
| 3  Bianchi   Giulia  14/03/2010  g.bianchi@studenti...       |
| 8  Bruno     Matteo  04/12/2008  m.bruno@studenti...         |
| 7  Greco     Chiara  21/05/2009  c.greco@studenti...         |
| ...                                                          |
| 15 studenti.                                                 |
+--------------------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | query e tabella (da scrivere) |
| `../includes/connessione.php`, `../includes/stile.css` | forniti |

## Descrizione

### query() e fetchAll()

```php
$pdo = connetti("scuola");
$studenti = $pdo->query("SELECT id, nome, cognome, data_nascita, email
                         FROM studenti ORDER BY cognome, nome")->fetchAll();
```

`query()` esegue l'istruzione SQL e restituisce un oggetto che rappresenta il risultato. `fetchAll()` lo legge tutto in una volta e restituisce un **array di array associativi**: ogni elemento è una riga, e le chiavi sono i nomi delle colonne (`$s["cognome"]`). Lo sai già usare: è l'«array di array» visto negli esercizi precedenti, con la differenza che i dati arrivano dal database. Il modo `FETCH_ASSOC` è già impostato in `connetti()`.

### Quando query() va bene

`query()` è adatta solo se l'istruzione SQL **non contiene dati forniti dall'utente**: qui è una frase fissa, quindi non c'è nulla da manipolare. Appena un valore arriva da `$_GET` o `$_POST` si passa alle query preparate, come nell'esercizio [Scheda dello studente](33-scheda-studente.md).

### La tabella

Un `foreach` genera una riga `<tr>` per studente. L'indice `$i` permette di colorare una riga su due:

```php
<?php foreach ($studenti as $i => $s): ?>
    <tr<?= $i % 2 === 1 ? ' class="alterna"' : '' ?>>
        <td><?= htmlspecialchars($s["cognome"]) ?></td>
        ...
```

I dati del database vanno trattati come qualunque input: passa sempre i testi da `htmlspecialchars` ([Sicurezza dell'output](21-sicurezza-output.md)). Un nome come `<b>Mario</b>` salvato per scherzo (o per attacco) non deve diventare HTML.

### Le date

MySQL restituisce le date come stringa `2010-03-14`. Per scriverle all'italiana:

```php
date("d/m/Y", strtotime($s["data_nascita"]))
```

`strtotime()` converte la stringa in un timestamp e `date()` lo formatta. Per ordinare e confrontare conviene lasciare la data nel formato originale, e convertirla solo al momento di mostrarla.

!!! tip "Elenco vuoto"
    `count($studenti) === 0` si controlla prima di stampare la tabella: una tabella con la sola intestazione sembra un errore, un messaggio chiaro no.

## Suggerimenti

- Prima scrivi la query e stampa `$studenti` con `print_r` per vedere la struttura; poi costruisci la tabella.
- Per il numero degli studenti usa `count($studenti)`, senza una seconda query.
- Il cognome viene prima del nome nell'`ORDER BY`: prova a invertirli e osserva la differenza tra gli omonimi.
- Estensione: aggiungi una colonna con il nome della classe unendo `studenti` e `classi` con una `JOIN` (`JOIN classi c ON c.id = s.id_classe`), e ordina per classe.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Elenco-studenti/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/Mariascuola**: importa prima il database `scuola` (file `PHP/db/scuola.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Elenco-studenti/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
