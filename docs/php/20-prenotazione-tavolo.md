# Prenotazione di un tavolo

Scrivi `index.php`: una pagina con un modulo che invia a sé stessa per prenotare un tavolo in un ristorante, con i campi `nome`, `telefono`, `persone`, `data`, `orario` (due opzioni, 19:30 e 21:00, come pulsanti di scelta) e `note` (facoltative). Controlla i dati sul server e, in caso di errori, mostra la pagina con il modulo **già compilato con i valori inseriti** e un messaggio rosso sotto ogni campo sbagliato. Se tutto è corretto mostra la conferma della prenotazione.

## Obiettivo

Costruire un modulo «ricordone»: dopo un errore l'utente non deve riscrivere tutto, e ogni errore compare accanto al campo che lo ha causato.

## Anteprima

```
+----------------------------------------+
| Prenota un tavolo                      |
| [ Controlla i campi evidenziati. ]     |
| Nome                                   |
| [ Luca                               ] |
| Telefono                               |
| [ abc                                ] |
| Numero non valido (da 8 a 15 cifre).   |  <- messaggio rosso sotto il campo
| Numero di persone    [ 4 ]             |
| Data    [ 2026-10-07 ]                 |
| Orario  ( ) 19:30  (•) 21:00           |  <- il pulsante scelto resta selezionato
| [ Prenota ]                            |
+----------------------------------------+
```

## Descrizione

### Riempire di nuovo i campi

Dopo l'invio, la pagina viene ricostruita da PHP: per far ricomparire ciò che l'utente aveva scritto, il valore ricevuto si stampa nell'attributo `value` del campo. Poiché il valore finisce dentro un attributo, va protetto con `htmlspecialchars`. Conviene una piccola funzione:

```php
function vecchio(string $campo): string
{
    return htmlspecialchars($_POST[$campo] ?? "");
}
// nel modulo:  <input type="text" name="nome" value="<?= vecchio("nome") ?>">
```

### Caselle, pulsanti di scelta e menu

Per i campi che non hanno un `value` testuale si usano attributi diversi: **`checked`** per i pulsanti radio e le caselle, **`selected`** per le opzioni di un menu. Nella `<textarea>` il testo si scrive **tra** i tag di apertura e chiusura.

```php
<input type="radio" name="orario" value="21:00"<?= ($_POST["orario"] ?? "") === "21:00" ? " checked" : "" ?>>
```

### Un messaggio per ogni campo

Gli errori si raccolgono in un array **associativo**, con il nome del campo come chiave: `$errori["telefono"] = "Numero non valido."`. Sotto ogni campo si scrive il messaggio solo se la chiave esiste (`isset($errori["telefono"])`).

### Espressioni regolari e date

**`preg_match(modello, testo)`** verifica se un testo rispetta un modello detto **espressione regolare**: `'/^[0-9 +]{8,15}$/'` significa «da 8 a 15 caratteri, tutti cifre, spazi o +». Per la data, `strtotime($data)` converte `"2026-10-07"` in un timestamp (o `false` se non è una data) e `strtotime("today")` è la mezzanotte di oggi: una data nel passato ha un timestamp minore.

## Suggerimenti

- Imposta `novalidate` sul modulo per provare i controlli del server senza quelli del browser.
- Le opzioni 19:30 e 21:00 si generano con un `foreach`: così il codice per `checked` si scrive una volta sola.
- La prenotazione è valida se `count($errori) === 0`; in quel caso mostra la conferma al posto del modulo.
- Estensione: rifiuta le prenotazioni per più di 60 giorni nel futuro.

## Soluzione

```php
--8<-- "PHP/Prenotazione-tavolo/index.php"
```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
