# Ordine con più prodotti

Nel database `negozio` le tabelle `ordini` (`id`, `id_utente`, `data_ordine`, `totale`), `righe_ordine` (`id_ordine`, `id_prodotto`, `quantita`, `prezzo_unitario`) e `prodotti` (`prezzo`, `giacenza`) descrivono gli acquisti. `ordine.php` (riepilogo di un ordine) e `includes/` sono già pronti. Scrivi `index.php`: elenca i prodotti con prezzo, disponibilità e un campo numerico «Quantità» (da 0 a 20) per ciascuno. All'invio del modulo, per tutti i prodotti con quantità maggiore di 0 deve creare un ordine intestato al cliente con `id = 1` (una costante, finché non c'è il login), inserire una riga d'ordine per prodotto copiando il prezzo corrente, scalare la giacenza e salvare il totale. Se un prodotto non ha pezzi a sufficienza l'intero ordine viene annullato, senza modifiche al database, e compare un messaggio di errore; se non è stato scelto nulla si mostra un avviso. Quando va tutto bene si viene portati a `ordine.php?id=...`.

## Obiettivo

Eseguire più scritture collegate in una transazione, in modo che riescano tutte oppure nessuna.

## Anteprima

```
index.php                                ordine.php?id=4
+---------------------------------+      +--------------------------------+
| Nuovo ordine                    |      | Ordine n. 4                    |
| [ Ordine annullato. «Monitor 24 |      | [ Ordine registrato il ... ]   |
|   pollici»: richiesti 9 pezzi   |      | Prodotto     Q.tà  Prezzo  Sub.|
|   ma ne restano 7. ]            |      | Mouse ...     2    19,90  39,80|
| Prodotto    Prezzo  Disp. Q.tà  |      | Totale                  39,80  |
| Mouse ...   € 19,90  40   [ 2 ] |      | Nuovo ordine                   |
| [ Conferma l'ordine ]           |      +--------------------------------+
+---------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `ordine.php` | riepilogo dell'ordine (fornito) |
| `includes/connessione.php`, `includes/flash.php`, `includes/stile.css` | forniti |
| `index.php` | modulo e registrazione dell'ordine (da scrivere) |

## Descrizione

### Perché serve una transazione

Registrare un ordine richiede più istruzioni: inserire la testata in `ordini`, inserire le righe in `righe_ordine`, scalare `giacenza` in `prodotti`, aggiornare il `totale`. Se una di queste istruzioni fallisce quando le prime due sono già state eseguite, il database resterebbe incoerente (un ordine a metà, magazzino sbagliato). Una **transazione** raggruppa le istruzioni: con `commit()` diventano tutte definitive, con `rollBack()` nessuna lascia traccia.

```php
$pdo->beginTransaction();
try {
    // ... INSERT, UPDATE ...
    $pdo->commit();
} catch (Throwable $e) {
    $pdo->rollBack();
    throw $e;
}
```

### Quantità come array nel modulo

Un campo con nome `quantita[ID]` fa arrivare in PHP un array associativo: `$_POST["quantita"]` vale `[3 => "2", 5 => "0", ...]`, con l'id del prodotto come chiave. Si ottiene scrivendo nel modulo `name="quantita[<?= $p["id"] ?>]"`.

### Validare le quantità

I valori sono comunque dati dell'utente. `filter_var()` con `FILTER_VALIDATE_INT` e i limiti `min_range`/`max_range` restituisce `false` se il valore non è un intero nell'intervallo; si tengono solo le quantità maggiori di 0, convertendo anche la chiave con `(int)`:

```php
$q = filter_var($q, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 20]]);
if ($q !== false && $q > 0) {
    $richieste[(int) $idProdotto] = $q;
}
```

### FOR UPDATE e concorrenza

Due clienti ordinano contemporaneamente l'ultimo pezzo di un prodotto: se entrambi leggono «giacenza 1» prima che l'altro scali, entrambi proseguono e la giacenza diventa -1. `SELECT ... FOR UPDATE` legge la riga e la **blocca** fino al `commit` o al `rollBack`: il secondo cliente attende, poi rilegge la giacenza aggiornata (0) e il suo ordine viene rifiutato.

```php
$leggi = $pdo->prepare("SELECT nome, prezzo, giacenza FROM prodotti WHERE id = :id FOR UPDATE");
```

!!! tip "Il blocco vale solo dentro una transazione"
    Fuori da `beginTransaction()` il blocco si rilascia subito, quindi non serve a nulla.

### Due tipi di errore

Non tutti i fallimenti sono uguali. «Pezzi insufficienti» o «prodotto inesistente» sono errori di *regole di business*: l'utente deve vederli. Per questi lancia una `RuntimeException` con un messaggio chiaro e prendila con un `catch` dedicato che annulla e invia un messaggio flash (vedi [Messaggi flash](30-messaggi-flash.md)). Un errore imprevisto (database non raggiungibile, SQL sbagliato) è invece una `Throwable` qualsiasi: annulli la transazione e rilanci l'eccezione, senza mostrare dettagli tecnici all'utente. L'ordine dei `catch` conta: prima il più specifico.

### Il prezzo si copia nella riga

Ogni riga d'ordine salva `prezzo_unitario`, copiato da `prodotti.prezzo` al momento dell'acquisto. Se domani il prezzo del prodotto cambia, il vecchio ordine deve mostrare ancora quanto è stato pagato. Il totale si calcola dai prezzi letti nella transazione, non da quelli del modulo, che l'utente potrebbe manipolare. Alla fine si fa un redirect al riepilogo (vedi [POST-Redirect-GET](24-iscrizione-evento.md)) con l'`id` ottenuto da `lastInsertId()`.

## Suggerimenti

- Chiama `session_start()` prima di usare `flash()`.
- Dichiara le tre query preparate una sola volta e riusale nel ciclo.
- Verifica il rollback: ordina 1 mouse e 8 monitor (ne restano 7): l'ordine deve essere rifiutato e in phpMyAdmin la tabella `ordini` non deve avere una riga in più, né il mouse deve aver perso un pezzo.
- Per provare la concorrenza apri due schede e inserisci un `SLEEP(10)` tra la lettura e l'aggiornamento.
- Estensione: limita il campo quantità alla giacenza disponibile e mostra «Esaurito» (senza campo) per i prodotti a zero; il controllo nella transazione resta indispensabile.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Ordine-multiplo/index.php"
    ```
=== "ordine.php"
    ```php
    --8<-- "PHP/Ordine-multiplo/ordine.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Ordine-multiplo/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
