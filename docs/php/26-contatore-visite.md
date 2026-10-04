# Contatore di visite

Scrivi `index.php`: una pagina che usa la **sessione** per contare quante volte l'utente l'ha aperta («Questa è la tua visita numero 3»), mostra la data e l'ora della prima visita e i primi caratteri dell'identificativo di sessione, e ha un pulsante «Azzera la sessione» che riporta il contatore a 1.

## Obiettivo

Memorizzare dati lato server per ogni visitatore con le sessioni (`session_start` e `$_SESSION`).

## Anteprima

```
+---------------------------------------------+
| Contatore di visite                         |
| +-----------------------------------------+ |
| | Questa è la tua visita numero 3.        | |
| | Prima visita: 04/10/2026 21:40:12       | |
| | Identificativo di sessione: 8f3a1c9d…   | |
| +-----------------------------------------+ |
| Ricarica la pagina (F5) per aumentare ...   |
| [ Azzera la sessione ]                      |
+---------------------------------------------+
```

## Descrizione

### Perché le sessioni

Un cookie salva i dati **sul computer dell'utente**, dove possono essere letti e modificati. Per tutto ciò che deve restare affidabile (chi è loggato, cosa c'è nel carrello) si usa una **sessione**: i dati restano **sul server**, e al browser viene dato solo un **identificativo** casuale (un cookie chiamato `PHPSESSID`) con cui il server ritrova i dati giusti a ogni richiesta.

```
Browser                                 Server
  | --- prima richiesta ----------------> |  crea la sessione "8f3a1c..." (vuota)
  | <-- cookie PHPSESSID=8f3a1c... ------ |
  | --- richiesta + PHPSESSID=8f3a1c... -> |  ritrova i dati: visite = 1
```

### `session_start` e `$_SESSION`

**`session_start()`** avvia la sessione (o riprende quella già esistente) e va chiamata **all'inizio di ogni pagina** che la usa, prima di qualsiasi output. Poi si usa l'array **`$_SESSION`** come un normale array associativo: ciò che ci scrivi sopravvive tra una richiesta e l'altra.

```php
session_start();
$_SESSION["visite"] = ($_SESSION["visite"] ?? 0) + 1;
```

L'operatore **`??=`** assegna un valore solo se la chiave non esiste ancora: utile per inizializzare un dato la prima volta.

### Terminare una sessione

Per cancellarne i dati: `$_SESSION = [];` svuota l'array e **`session_destroy()`** elimina la sessione sul server. Il cookie nel browser resta, ma punta a una sessione che non esiste più.

## Suggerimenti

- Ogni **browser** ha la sua sessione: aprendo la pagina in una finestra anonima il contatore riparte.
- Dopo l'azzeramento usa un redirect: così il contatore non viene incrementato due volte nella stessa richiesta.
- Mostra solo una parte dell'identificativo (`substr(session_id(), 0, 8)`): l'identificativo completo è come una chiave di casa.
- Estensione: salva nella sessione anche l'ora dell'ultima visita e mostra quanti secondi sono passati.

## Soluzione

```php
--8<-- "PHP/Contatore-visite/index.php"
```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: cookie e sessioni esistono solo quando c'è un server che risponde a un browser, quindi OneCompiler non può eseguirlo. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
