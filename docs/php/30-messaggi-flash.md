# Messaggi flash

Realizza una rubrica in `index.php` che conserva i contatti nella sessione: un modulo aggiunge un contatto (nome e telefono, controllati), una tabella li elenca con il pulsante «Elimina». Dopo ogni azione, la pagina deve mostrare un **messaggio flash**: verde se un contatto è stato aggiunto, rosso se i dati erano sbagliati, azzurro se è stato eliminato. Il messaggio compare **una sola volta**: ricaricando la pagina sparisce. Scrivi in `flash.php` le due funzioni che gestiscono i messaggi: `flash($tipo, $testo)` per prepararne uno e `mostraFlash()` per stamparli ed eliminarli.

## Obiettivo

Comunicare l'esito di un'azione alla pagina successiva a un redirect, usando la sessione come «posta» temporanea.

## Anteprima

```
Dopo aver aggiunto un contatto              Dopo aver ricaricato (F5)
+--------------------------------+          +--------------------------------+
| Rubrica                        |          | Rubrica                        |
| [ Contatto «Anna» aggiunto. ]  |  <- verde| (nessun messaggio)             |
| Nome [      ] Telefono [     ] |          | Nome [      ] Telefono [     ] |
| Contatti (1)                   |          | Contatti (1)                   |
| Anna | 333 111222 | [Elimina]  |          | Anna | 333 111222 | [Elimina]  |
+--------------------------------+          +--------------------------------+
```

## Descrizione

### Il problema del redirect

Dopo un invio POST è buona regola fare un redirect (pattern POST-Redirect-GET, visto nell'esercizio sul modulo di contatto). Ma il redirect fa **perdere** le variabili della pagina che ha elaborato i dati: come si dice alla pagina successiva «contatto aggiunto con successo»?

### La sessione come messaggio

La soluzione è lasciare il messaggio nella **sessione**: la pagina che elabora i dati lo scrive, la pagina successiva lo legge, lo mostra e **lo cancella subito**. Il messaggio vive così il tempo di una sola visualizzazione: da qui il nome *flash*.

```php
function flash(string $tipo, string $testo): void
{
    $_SESSION["flash"][] = ["tipo" => $tipo, "testo" => $testo];
}
```

L'istruzione `$_SESSION["flash"][] = ...` aggiunge in coda a un array che PHP crea da solo se non esiste: si possono quindi accumulare più messaggi. `mostraFlash()` li scorre con un `foreach`, li stampa in un paragrafo con la classe CSS del tipo e poi chiama `unset($_SESSION["flash"])`.

### Costruire una piccola libreria

Le due funzioni stanno in un file a parte (`flash.php`) da includere con `require`: è il primo passo verso un codice **riutilizzabile**. Qualsiasi altra pagina del sito può usare gli stessi messaggi con due righe.

### Un array con id stabili

I contatti sono in `$_SESSION["contatti"]` con una chiave numerica che **non cambia** quando se ne elimina uno (un contatore `prossimo_id` nella sessione). Il pulsante «Elimina» invia quell'id.

## Suggerimenti

- Chiama sempre `session_start()` **prima** di includere `flash.php` e di usare le sue funzioni.
- Passa il testo del messaggio da `htmlspecialchars()`: contiene il nome scritto dall'utente.
- Il telefono si controlla con `preg_match('/^[0-9 +]{6,15}$/', $telefono)`.
- Estensione: aggiungi il tipo `avviso` (giallo) e mostra un messaggio anche quando si tenta di aggiungere due volte lo stesso numero.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Messaggi-flash/index.php"
    ```
=== "flash.php"
    ```php
    --8<-- "PHP/Messaggi-flash/flash.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: cookie e sessioni esistono solo quando c'è un server che risponde a un browser, quindi OneCompiler non può eseguirlo. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
