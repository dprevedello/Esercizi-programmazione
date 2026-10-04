# GET e POST a confronto

Il file `index.html` (già pronto) contiene due moduli identici con i campi `nome` e `citta`: uno con `method="get"`, l'altro con `method="post"`, entrambi diretti a `ricevi.php`. Scrivi `ricevi.php` in modo che mostri il metodo della richiesta, l'indirizzo richiesto e il contenuto degli array `$_GET` e `$_POST` in due tabelle. Poi invia entrambi i moduli e confronta cosa cambia nella barra degli indirizzi.

## Obiettivo

Capire la differenza tra i metodi GET e POST e vedere dove arrivano i dati nei due casi.

## Anteprima

```
Dopo l'invio con GET                  Dopo l'invio con POST
(indirizzo: ricevi.php?nome=Gi&...)   (indirizzo: ricevi.php)
+--------------------------------+    +--------------------------------+
| Dati ricevuti                  |    | Dati ricevuti                  |
| Metodo: GET                    |    | Metodo: POST                   |
| Indirizzo: ricevi.php?nome=... |    | Indirizzo: ricevi.php          |
|                                |    |                                |
| Contenuto di $_GET             |    | Contenuto di $_GET             |
| nome | Gi    citta | Varese     |    | (array vuoto)                  |
| Contenuto di $_POST            |    | Contenuto di $_POST            |
| (array vuoto)                  |    | nome | Gi    citta | Varese  |
+--------------------------------+    +--------------------------------+
```

## Descrizione

### GET: i dati nell'indirizzo

Con **GET** i campi vengono aggiunti all'indirizzo come **query string** (`ricevi.php?nome=Gi&citta=Varese`). I dati sono quindi **visibili** a tutti, finiscono nella cronologia del browser e possono essere salvati nei preferiti o condivisi come link. Per questo GET va usato per richieste che **leggono** dati e non li modificano: ricerche, filtri, pagine di dettaglio. Arrivano nell'array `$_GET`.

### POST: i dati nel corpo della richiesta

Con **POST** i dati viaggiano nel **corpo** della richiesta, non nell'indirizzo: non compaiono nella barra e non vengono salvati nei preferiti. Si usa per le operazioni che **modificano** qualcosa (registrazioni, login, inserimenti) e per i dati riservati. Arrivano nell'array `$_POST`.

| | GET | POST |
|---|---|---|
| Dove viaggiano i dati | nell'indirizzo | nel corpo della richiesta |
| Array PHP | `$_GET` | `$_POST` |
| Si può mettere nei preferiti | sì | no |
| Uso tipico | ricerche, filtri | inserimenti, login |

!!! warning "POST non è crittografia"
    Con POST i dati non si vedono nella barra, ma **non sono cifrati**: chi intercetta la connessione li legge comunque. Per proteggerli serve HTTPS.

### `$_SERVER`

Un'altra superglobale, **`$_SERVER`**, contiene informazioni sulla richiesta: `$_SERVER["REQUEST_METHOD"]` dice se è `GET` o `POST`, `$_SERVER["REQUEST_URI"]` restituisce l'indirizzo richiesto.

## Suggerimenti

- Scrivi una funzione `tabella(array $dati)` che stampa la tabella: la userai due volte.
- Un array vuoto non deve produrre una tabella senza righe: stampa un messaggio.
- Digita a mano nella barra degli indirizzi `ricevi.php?nome=Prova&eta=17`: compaiono anche campi che nessun modulo ha inviato. Nessun controllo del browser protegge la tua pagina.
- Usa `htmlspecialchars()` quando stampi chiavi e valori.

## Soluzione

=== "ricevi.php"
    ```php
    --8<-- "PHP/Get-e-post/ricevi.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Get-e-post/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: OneCompiler esegue solo script da riga di comando e non può inviare moduli. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
