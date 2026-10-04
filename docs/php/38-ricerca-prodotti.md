# Ricerca dei prodotti

Nel database `negozio` (tabelle `prodotti` e `categorie`) scrivi `index.php`: un modulo di ricerca e, sotto, la tabella dei prodotti che soddisfano i criteri (nome, categoria, prezzo, giacenza). I criteri, tutti facoltativi, sono: un testo da cercare nel nome **o** nella descrizione, una categoria (menu a tendina con «Tutte»), un prezzo massimo, la casella «Solo prodotti disponibili» (giacenza maggiore di 0) e l'ordinamento (nome, prezzo crescente, prezzo decrescente). Chi lascia vuoto un campo non ottiene nessun filtro su quel criterio. Dopo la ricerca il modulo deve conservare i valori inseriti, mostrare quanti prodotti sono stati trovati e offrire un link «Azzera i filtri». Il file `includes/connessione.php` è già fornito.

## Obiettivo

Costruire dinamicamente una query SQL in base ai filtri compilati, senza mai inserire valori dell'utente nella stringa SQL.

## Anteprima

```
+---------------------------------------------------------------+
| Cerca nel catalogo                                            |
| Testo       [ mouse        ]   Categoria  [ Tutte        v ]  |
| Prezzo max  [ 50           ]   [x] Solo prodotti disponibili  |
| Ordina per  [ Prezzo crescente v ]   [ Cerca ]  Azzera i filtri|
|                                                               |
| 2 prodotti trovati                                            |
| Prodotto              Categoria    Prezzo   Giacenza          |
| Tappetino per mouse   Accessori    €  9,90        50          |
| Mouse ottico wireless Periferiche  € 19,90        40          |
+---------------------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `includes/connessione.php`, `includes/stile.css` | forniti |
| `index.php` | modulo, costruzione della query e risultati (da scrivere) |

## Descrizione

### Perché GET

Una ricerca non modifica nulla: si può ripetere quante volte si vuole. Per questo il modulo usa `method="get"`: i criteri finiscono nell'indirizzo (`index.php?q=mouse&massimo=50`), che si può salvare nei preferiti, condividere o ricaricare senza il messaggio «Invia nuovamente il modulo». Il POST resta per le operazioni che cambiano dati (vedi [Get e post](17-get-e-post.md)).

### Condizioni e parametri

La query si costruisce aggiungendo un pezzo di `WHERE` per ogni criterio compilato. Le condizioni finiscono in un array, i valori in un secondo array con le stesse chiavi dei segnaposto:

```php
$condizioni = [];
$parametri  = [];

if ($categoria > 0) {
    $condizioni[] = "p.id_categoria = :categoria";
    $parametri["categoria"] = $categoria;
}
if ($disponibili) {
    $condizioni[] = "p.giacenza > 0";
}

$sql = "SELECT ... FROM prodotti p JOIN categorie c ON c.id = p.id_categoria";
if (count($condizioni) > 0) {
    $sql .= " WHERE " . implode(" AND ", $condizioni);
}
```

`implode(" AND ", ...)` mette il connettore solo tra una condizione e l'altra, quindi non devi preoccuparti di quale sia la prima. Poi `prepare($sql)` e `execute($parametri)`. Nel testo SQL finiscono solo frammenti scritti da te, mai valori inseriti dall'utente.

### LIKE e caratteri jolly

I simboli `%` si aggiungono **al valore**, non alla stringa SQL:

```php
$modello = "%" . addcslashes($q, "%_\\") . "%";
```

`addcslashes()` mette una barra davanti a `%`, `_` e `\` scritti dall'utente: così chi cerca `50%` cerca davvero il simbolo, non «qualsiasi testo».

### Segnaposto distinti

La condizione sul testo usa il valore due volte (nome e descrizione). Con le impostazioni di PDO per MySQL (emulazione disattivata, o driver nativo) lo stesso segnaposto non può comparire due volte nella query: usa `:q1` e `:q2` e passa lo stesso valore a entrambi.

```php
$condizioni[] = "(p.nome LIKE :q1 OR p.descrizione LIKE :q2)";
$parametri["q1"] = $modello;
$parametri["q2"] = $modello;
```

!!! warning "Le parentesi"
    La condizione con `OR` va racchiusa tra parentesi: senza, `AND` ha la precedenza e il filtro sulla categoria si applicherebbe solo a una metà del `OR`.

### ORDER BY non si parametrizza

Un segnaposto può sostituire un **valore**, non il nome di una colonna o `ASC`/`DESC`. Il criterio di ordinamento si sceglie quindi da un elenco di valori ammessi (*whitelist*): l'utente manda una chiave, e a SQL arriva solo il frammento che hai scritto tu.

```php
$ordiniAmmessi = ["nome" => "p.nome ASC", "prezzo_asc" => "p.prezzo ASC", "prezzo_desc" => "p.prezzo DESC"];
if (!isset($ordiniAmmessi[$ordine])) {
    $ordine = "nome";
}
$sql .= " ORDER BY " . $ordiniAmmessi[$ordine];
```

### Il modulo ricorda i valori

Rimetti nei campi i valori ricevuti, sempre con `htmlspecialchars()`. Per i menu aggiungi `selected` all'opzione corrispondente. La casella di controllo non invia nulla se non è spuntata: si legge con `isset($_GET["disponibili"])` e si ripristina con `checked`.

## Suggerimenti

- Converti la categoria con `(int)`: un valore non numerico diventa 0, cioè «Tutte».
- Il prezzo massimo si usa solo se `is_numeric()` è vero; altrimenti ignoralo.
- Prova `?q=%25` nell'indirizzo con e senza `addcslashes()` e osserva la differenza.
- Per controllare la query finale stampa temporaneamente `$sql` e `$parametri` con `var_dump`.
- Estensione: aggiungi un prezzo minimo e un criterio «solo in esaurimento» (giacenza minore di 10).

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Ricerca-prodotti/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Ricerca-prodotti/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
