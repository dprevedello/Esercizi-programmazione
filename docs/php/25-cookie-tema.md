# Cookie: tema e nome

Scrivi `index.php`: una pagina che permette all'utente di scegliere tra tema chiaro e tema scuro e di scrivere il proprio nome, e che **ricorda** le due preferenze per 30 giorni usando due cookie (`tema` e `nome`). Il tema scuro si ottiene aggiungendo la classe `scuro` al `<body>`; il nome compare nel titolo («Ciao, Giulia!»). Un pulsante «Dimentica le mie preferenze» cancella i due cookie. La pagina mostra anche l'elenco dei cookie ricevuti dal browser.

## Obiettivo

Salvare nel browser dell'utente piccole preferenze con `setcookie()` e rileggerle dall'array `$_COOKIE`.

## Anteprima

```
+------------------------------------------+
| Ciao, Giulia!                            |   <- nome letto dal cookie "nome"
|                                          |
| Tema                                     |
| Tema attuale: scuro                      |
| [ Chiaro ] [ Scuro ]                     |
|                                          |
| Come ti chiami?                          |
| [ Giulia                ] [ Ricordami ]  |
|                                          |
| Cookie ricevuti dal browser              |
|  • tema = scuro                          |
|  • nome = Giulia                         |
| [ Dimentica le mie preferenze ]          |
+------------------------------------------+
```

## Descrizione

### Che cos'è un cookie

Un **cookie** è un piccolo dato (una coppia nome/valore) che il server chiede al browser di conservare. Da quel momento, a **ogni richiesta** successiva allo stesso sito il browser lo rimanda automaticamente. È il meccanismo che permette a un sito di «ricordarsi» di te, anche se il protocollo HTTP, di per sé, non ricorda nulla tra una richiesta e l'altra.

### Impostare e leggere: `setcookie` e `$_COOKIE`

```php
setcookie("tema", "scuro", time() + 30 * 24 * 60 * 60);   // vale 30 giorni
echo $_COOKIE["tema"] ?? "chiaro";                        // lettura
```

Il terzo argomento è la **scadenza** come timestamp; senza, il cookie sparisce alla chiusura del browser. Il cookie è memorizzato **sul computer dell'utente**: ricorda che chiunque può modificarlo, quindi il valore letto da `$_COOKIE` va **sempre controllato** (qui con `in_array` su un elenco di temi ammessi) e stampato con `htmlspecialchars`.

### Quando è disponibile

I cookie viaggiano nelle **intestazioni** della risposta, quindi `setcookie()` deve essere chiamata **prima di qualsiasi output** HTML. Inoltre `$_COOKIE` contiene solo i cookie arrivati con la richiesta **corrente**: un cookie appena impostato diventa visibile alla richiesta successiva. Per questo, dopo aver impostato il cookie, si fa un **redirect** alla stessa pagina.

### Cancellare un cookie

Per cancellare un cookie lo si reimposta con una scadenza **già passata**: `setcookie("tema", "", time() - 3600)`.

!!! tip "Guarda i cookie nel browser"
    Negli strumenti per sviluppatori (tasto F12) c'è la scheda *Applicazione* (o *Archiviazione*) con l'elenco dei cookie del sito: puoi vedere valore e scadenza, modificarli ed eliminarli. Prova a cambiare il valore di `tema` con qualcosa di inatteso.

## Suggerimenti

- Salva il tema solo se è nell'elenco ammesso: `in_array($valore, $temiAmmessi, true)`.
- Il nome dell'utente è un dato libero: limitane la lunghezza e stampalo con `htmlspecialchars`.
- I pulsanti «Chiaro» e «Scuro» possono essere due `<button name="tema" value="...">` nello stesso modulo.
- Estensione: aggiungi un cookie `ultima_visita` con la data e l'ora dell'ultimo accesso.

## Soluzione

```php
--8<-- "PHP/Cookie-tema/index.php"
```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: cookie e sessioni esistono solo quando c'è un server che risponde a un browser, quindi OneCompiler non può eseguirlo. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
