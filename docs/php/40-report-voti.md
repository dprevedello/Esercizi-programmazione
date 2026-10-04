# Report dei voti

Nel database `scuola` le tabelle `classi` (`id`, `nome`), `studenti` (`id`, `nome`, `cognome`, `id_classe`), `materie` (`id`, `nome`) e `voti` (`id_studente`, `id_materia`, `voto`, `data`, `tipo`) contengono i dati di una scuola. Scrivi `index.php`, una pagina di report con quattro sezioni: la media dei voti e il numero di voti per classe; la media per materia, dalla più alta alla più bassa; i cinque studenti con la media più alta (considerando solo chi ha almeno tre voti); l'elenco delle insufficienze (voto minore di 6) con studente, classe, materia, tipo e voto. Le medie sono mostrate con due decimali e una barra orizzontale proporzionale al valore (10 = barra piena). L'elenco delle insufficienze si può restringere a una classe con un menu a tendina che invia `?classe=ID`. `includes/connessione.php` e `includes/stile.css` sono forniti.

## Obiettivo

Usare query di aggregazione su più tabelle e presentare i risultati con formattazione e piccoli elementi grafici.

## Anteprima

```
+-----------------------------------------------------------+
| Report dei voti                                           |
| Media per classe                                          |
| Classe   Voti   Media                                     |
| 3AINF     48    6,85  [#################-----]            |
| 4AINF     40    7,10  [##################----]            |
|                                                           |
| I cinque studenti con la media più alta                   |
| 1. Bianchi Giulia (3AINF) - media 8,40 su 6 voti          |
|                                                           |
| Insufficienze (7)       Classe [ Tutte  v ]               |
| Studente        Classe  Materia      Tipo     Voto        |
| Rossi Marco     3AINF  Matematica    scritto  4,5         |
+-----------------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `includes/connessione.php`, `includes/stile.css` | forniti |
| `index.php` | query, funzione di aiuto e pagina (da scrivere) |

## Descrizione

### Le aggregazioni le fa il database

Calcolare una media scorrendo tutte le righe in PHP è lento e inutile: `AVG()`, `COUNT()` e `GROUP BY` restituiscono già un risultato per gruppo. Il compito di PHP è solo eseguire la query e mostrare le righe. Per la media per classe servono tre tabelle in JOIN (`classi` → `studenti` → `voti`):

```php
$perClasse = $pdo->query(
    "SELECT c.nome AS classe, COUNT(v.id) AS numero_voti, AVG(v.voto) AS media
     FROM classi c
     JOIN studenti s ON s.id_classe = c.id
     JOIN voti v ON v.id_studente = s.id
     GROUP BY c.id, c.nome
     ORDER BY c.nome"
)->fetchAll();
```

Dai alle espressioni un **alias** (`AS media`): è il nome con cui ritrovi il valore nell'array (`$r["media"]`). Nella classifica dei migliori `HAVING COUNT(v.id) >= 3` filtra i *gruppi* (dopo l'aggregazione), mentre `WHERE` filtra le *righe* (prima), e `LIMIT 5` tiene i primi cinque.

### Mostrare le medie

`AVG()` su un `DECIMAL` restituisce un decimale che PDO consegna come testo, con molte cifre. Converti in `float` e formatta:

```php
number_format((float) $r["media"], 2, ",", ".")   // 6,85
```

Per la barra scrivi una piccola funzione che restituisce un `<div>` largo in percentuale quanto il voto (da 0 a 10, quindi `voto * 10` per cento):

```php
function barra(float $voto): string
{
    return '<div style="background:var(--primario);height:.6rem;border-radius:3px;width:' . round($voto * 10) . '%"></div>';
}
```

La funzione è usata sia nella tabella delle classi sia in quella delle materie: è il vantaggio di averla scritta una volta sola (vedi [Funzioni](05-funzioni.md)). Nella pagina la si stampa senza `htmlspecialchars()` perché il codice HTML è scritto da te e il numero è calcolato, non è testo inserito dall'utente.

### Un filtro facoltativo

Le insufficienze si possono limitare a una classe. La query base contiene già un `WHERE`, quindi la condizione sulla classe si aggiunge con `AND` solo se il parametro è valido, e il valore passa per un segnaposto:

```php
$idClasse  = (int) ($_GET["classe"] ?? 0);
$parametri = [];
if ($idClasse > 0) {
    $sql .= " AND c.id = :classe";
    $parametri["classe"] = $idClasse;
}
$sql .= " ORDER BY v.voto, s.cognome";   // ORDER BY sempre dopo il WHERE
$stmt = $pdo->prepare($sql);
$stmt->execute($parametri);
```

### Menu che si invia da solo

Il menu a tendina ha `onchange="this.form.submit()"`: appena scegli una classe il modulo parte, senza bottone. Chi ha JavaScript disattivato non potrebbe filtrare, quindi aggiungi un bottone dentro `<noscript>`: viene mostrato solo in quel caso. Il modulo usa `method="get"`, così l'indirizzo del filtro si può condividere (vedi [la ricerca dei prodotti](38-ricerca-prodotti.md)).

## Suggerimenti

- Prova ogni query in phpMyAdmin prima di inserirla nel PHP.
- Controlla che nella tabella delle classi il numero di voti coincida con quello che ottieni con un semplice `SELECT COUNT(*) FROM voti`.
- Se una classe non ha voti, la JOIN la esclude: usa `LEFT JOIN` solo se vuoi mostrarla comunque (con media nulla!).
- `number_format()` su `NULL` darebbe 0,00: valuta come mostrare «n.d.» quando manca la media.
- Estensione: aggiungi una sezione «Media per studente della classe scelta» che usa lo stesso parametro `?classe=`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Report-voti/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `scuola` (file `PHP/db/scuola.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Report-voti/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
