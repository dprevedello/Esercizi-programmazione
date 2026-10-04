# Iscrizione a un evento

Realizza il sito di iscrizione alla «Notte del Codice», un evento serale della scuola. `index.php` contiene il modulo (nome, cognome, email, classe tra 3AINF, 4AINF e 5AINF, **almeno uno** tra quattro laboratori, tipo di pasto, accettazione del regolamento), lo controlla sul server, mostra gli errori accanto ai campi e conserva i valori inseriti; rifiuta un'email già iscritta. Se i dati sono corretti salva l'iscrizione in `dati/iscrizioni.csv` con un **codice** casuale di 6 caratteri e porta l'utente a `conferma.php?codice=...`, che mostra il riepilogo. `elenco.php` mostra il numero di iscritti, quanti per laboratorio e l'elenco.

## Obiettivo

Mettere insieme moduli, validazione, caselle multiple, salvataggio su file CSV e redirect in un piccolo progetto completo.

## Anteprima

```
index.php                         conferma.php?codice=3F9A1C     elenco.php
+---------------------------+     +-------------------------+    +---------------------+
| Notte del Codice          |     | Iscrizione confermata!  |    | Iscritti: 2         |
| [ Ci sono 2 campi ... ]   |     | Grazie Giulia Bianchi   |    | Per laboratorio     |
| Nome [ Giulia           ] |     | Laboratori: web, giochi |    |  • robotica: 1      |
| Email [ g@x.it          ] |     | Pasto: vegetariano      |    |  • web: 1 ...       |
| Questa email è già ...    |     | Il tuo codice: 3F9A1C   |    | Codice Nome Classe  |
| Laboratori [x] Web [ ] .. |     +-------------------------+    | 3F9A1C Giulia 4AINF |
| [ Iscriviti ]             |                                    +---------------------+
+---------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | modulo, validazione, salvataggio e redirect |
| `conferma.php` | riepilogo dell'iscrizione, cercata nel CSV tramite il codice |
| `elenco.php` | statistiche e tabella degli iscritti |
| `dati/iscrizioni.csv` | creato da PHP: una riga per iscrizione |

## Descrizione

### Il formato CSV: `fputcsv` e `fgetcsv`

Un file **CSV** (valori separati da virgole) memorizza una tabella con una riga per record. Scriverlo a mano è rischioso (cosa succede se un nome contiene una virgola?): **`fputcsv($f, $riga)`** scrive un array come riga CSV mettendo le virgolette dove servono, e **`fgetcsv($f)`** legge la riga successiva restituendo l'array dei campi (o `false` alla fine del file). Per aprire un file si usa **`fopen($percorso, "a")`** (`"a"` = aggiunta in coda, `"r"` = lettura) e si chiude con **`fclose`**.

```php
$f = fopen($file, "a");
fputcsv($f, ["3F9A1C", "Giulia", "Bianchi"], ",", "\"", "");
fclose($f);
```

!!! note "L'ultimo argomento vuoto"
    I tre argomenti dopo la riga (separatore, delimitatore, carattere di escape) sono quelli predefiniti; l'ultimo viene lasciato **vuoto** perché dalla versione 8.4 di PHP omettere il parametro produce un avviso di funzionalità obsoleta.

### Un codice casuale

Un codice di 6 caratteri si ottiene da `strtoupper(substr(md5(uniqid("", true)), 0, 6))`: `uniqid` genera un identificativo unico, `md5` lo trasforma in una stringa di cifre e lettere, `substr` ne prende i primi 6 caratteri. (`md5` qui serve solo a mescolare: non è adatto per le password.)

### Controllare un parametro con un'espressione regolare

`conferma.php` riceve il codice dall'indirizzo: prima di cercarlo si verifica che abbia la forma attesa, `preg_match('/^[A-Z0-9]{6}$/', $codice)`. Un parametro con un formato sbagliato è già un errore, senza bisogno di leggere il file.

### Validazione completa

Il modulo applica tutto ciò che hai visto negli esercizi precedenti: array di errori **associativo**, `filter_var` per l'email, array di valori ammessi per classe e pasto, `array_intersect` per i laboratori, `isset` per il regolamento, valori conservati nei campi con `htmlspecialchars`.

## Suggerimenti

- Per l'email già presente, scrivi una funzione che scorre il CSV con `fgetcsv` e confronta ignorando maiuscole e minuscole.
- I laboratori scelti si salvano in una sola colonna con `implode(", ", $scelti)`; per contarli in `elenco.php` li si spezza di nuovo con `explode`.
- Dopo il redirect usa `exit`, sempre.
- Se il codice non esiste, `conferma.php` risponde con `http_response_code(404)`.
- Estensione: limita a 50 il numero massimo di iscritti e mostra «Iscrizioni chiuse».

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Iscrizione-evento/index.php"
    ```
=== "conferma.php"
    ```php
    --8<-- "PHP/Iscrizione-evento/conferma.php"
    ```
=== "elenco.php"
    ```php
    --8<-- "PHP/Iscrizione-evento/elenco.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP** e il permesso di scrivere nella cartella `dati/`. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
