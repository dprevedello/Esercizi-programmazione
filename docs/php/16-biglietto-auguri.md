# Biglietto di auguri

Il modulo `index.html` (già pronto, non modificarlo) invia a `biglietto.php` con il metodo POST tre campi: `destinatario` (testo), `occasione` (`compleanno`, `natale` o `laurea`) e `messaggio` (testo libero). Scrivi `biglietto.php` in modo che mostri un biglietto con il titolo adatto all'occasione («Buon compleanno, Anna!»), il messaggio scritto dall'utente (o «nessun messaggio personale» se è vuoto) e un link per crearne un altro. Se mancano dati, mostra «Mancano dei dati: compila il modulo.».

## Obiettivo

Ricevere i dati di un modulo HTML in un file PHP tramite l'array `$_POST` e usarli per costruire la pagina di risposta.

## Anteprima

```
Modulo (index.html)                  Risultato (biglietto.php)
+-----------------------------+      +----------------------------------+
| Crea un biglietto di auguri |      | +------------------------------+ |
| Per chi è il biglietto?     |      | | Buon compleanno, Anna!       | | <- titolo scelto
| [ Anna                    ] |      | | Tanti auguri,                | |    dall'occasione
| Occasione  [ Compleanno  v] |      | | ci vediamo sabato!           | | <- messaggio
| Messaggio                   |      | +------------------------------+ |
| [ Tanti auguri, ...       ] |      | ← Crea un altro biglietto        |
| [ Crea il biglietto ]       |      +----------------------------------+
+-----------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.html` | il modulo (fornito) |
| `biglietto.php` | la pagina che elabora i dati (da scrivere) |

## Descrizione

### Il modulo: `action` e `method`

Un modulo HTML invia i dati alla pagina indicata dall'attributo **`action`**, con il metodo scelto in **`method`**. Con **`post`** i dati viaggiano nel corpo della richiesta, non nell'indirizzo. Ogni campo viene inviato con il nome scritto nell'attributo **`name`**.

```html
<form action="biglietto.php" method="post">
    <input type="text" name="destinatario">
```

### L'array `$_POST`

Quando la pagina riceve la richiesta, PHP riempie l'array **`$_POST`**: una **superglobale** associativa che ha come chiavi i valori degli attributi `name` e come valori ciò che l'utente ha scritto (sempre come stringhe). Se un campo non è stato inviato la chiave manca: si usa `??` per avere un valore predefinito.

```php
$destinatario = trim($_POST["destinatario"] ?? "");
```

### Controllare i dati e proteggere l'output

Un utente può scrivere qualsiasi cosa, o chiamare la pagina senza passare dal modulo: i valori vanno **controllati** (qui con un array di occasioni ammesse e `array_key_exists`). Prima di stampare un testo scritto dall'utente va passato da **`htmlspecialchars()`**, che impedisce al browser di interpretarlo come HTML; **`nl2br()`** trasforma gli a capo in `<br>`. Il perché di questa precauzione è spiegato nell'esercizio *Sicurezza dell'output*: per ora scrivila sempre.

## Suggerimenti

- L'array `$titoli` con le tre occasioni serve sia per scegliere il testo sia per controllare che il valore ricevuto sia ammesso.
- Il messaggio è facoltativo: stampa la frase alternativa se, tolti gli spazi con `trim`, è vuoto.
- Prova ad aprire `biglietto.php` direttamente dal browser, senza passare dal modulo: la pagina non deve rompersi.
- Estensione: aggiungi un campo `mittente` e stampa la firma in fondo al biglietto.

## Soluzione

=== "biglietto.php"
    ```php
    --8<-- "PHP/Biglietto-auguri/biglietto.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Biglietto-auguri/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: OneCompiler esegue solo script da riga di comando e non può inviare moduli. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
