# Sicurezza dell'output

Il modulo `index.html` (già pronto) ha due pulsanti: il primo invia il commento a `vulnerabile.php` (già pronto), che lo stampa così com'è; il secondo lo invia a `sicura.php`. Prova prima la versione vulnerabile inserendo come commento del codice HTML (per esempio `<h1 style="color:red">Ciao</h1>`) e osserva cosa succede. Poi scrivi `sicura.php`, che mostra autore e commento **senza** permettere al browser di interpretarli come HTML.

## Obiettivo

Capire il rischio **XSS** (Cross-Site Scripting) e difendersi con `htmlspecialchars` ogni volta che si stampa un dato inserito da un utente.

## Anteprima

```
Versione vulnerabile                   Versione sicura
+---------------------------------+    +----------------------------------+
| Commento ricevuto               |    | Commento ricevuto                |
| A ha scritto:                   |    | A ha scritto:                    |
|   Ciao        <- grande e rossa |    |  <h1 style="color:red">Ciao</h1> |
|                  (HTML eseguito)|    |       (mostrato come testo)      |
+---------------------------------+    +----------------------------------+
```

## Descrizione

### Che cos'è l'XSS

Quando una pagina stampa un testo scritto da un utente senza controlli, **chiunque può inserirci del codice**: HTML, ma anche JavaScript tra i tag `<script>`. Se il commento viene mostrato agli altri visitatori (come in un libro degli ospiti o un forum), il codice si esegue **nel browser di ogni visitatore**: può rubare le sessioni, falsificare la pagina, reindirizzare. Questo attacco si chiama **Cross-Site Scripting** (XSS).

### `htmlspecialchars`

La difesa è semplice: prima di stampare, i caratteri con significato speciale in HTML (`<`, `>`, `&`, `"`, `'`) vanno trasformati in **entità** (`&lt;`, `&gt;`, `&amp;`...), così il browser li mostra come testo normale invece di eseguirli. Lo fa **`htmlspecialchars($testo, ENT_QUOTES, "UTF-8")`**.

```php
echo htmlspecialchars("<b>ciao</b>");   // &lt;b&gt;ciao&lt;/b&gt;  (il browser mostra: <b>ciao</b>)
```

La regola generale è: **ogni dato che arriva dall'esterno** (`$_GET`, `$_POST`, `$_COOKIE`, dati letti da un database o da un file) **si passa da `htmlspecialchars` quando lo si stampa**. Una funzione di comodo, come `e()` nell'esempio, la rende veloce da scrivere.

### Escape all'uscita, non all'ingresso

Il testo si **conserva intatto** (nel database, nel file) e si converte solo **al momento di mostrarlo**: lo stesso dato potrebbe essere usato in contesti diversi (una pagina web, un'email, un file CSV) che richiedono precauzioni diverse.

## Suggerimenti

- Prova anche `<script>alert("XSS")</script>` nella versione vulnerabile: la finestra compare. (Se non compare nel tuo browser, guarda comunque il sorgente della pagina.)
- Con `nl2br()` puoi conservare gli a capo del commento: va applicato **dopo** `htmlspecialchars`, non prima.
- Da questo momento, ogni volta che stampi un valore con `<?= $qualcosa ?>` chiediti da dove arriva.
- Estensione: scrivi una funzione `e()` che accetti anche numeri e valori `null`.

## Soluzione

=== "sicura.php"
    ```php
    --8<-- "PHP/Sicurezza-output/sicura.php"
    ```
=== "vulnerabile.php"
    ```php
    --8<-- "PHP/Sicurezza-output/vulnerabile.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Sicurezza-output/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: OneCompiler esegue solo script da riga di comando e non può inviare moduli. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
