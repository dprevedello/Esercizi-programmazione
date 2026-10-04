# Array di array

Scrivi uno script PHP che memorizzi cinque studenti (nome, classe, voto) in un array di array associativi. Stampa l'elenco in colonne, la media dei voti, i soli studenti della 5AINF, la classifica dal voto più alto e infine i nomi raggruppati per classe.

## Obiettivo

Rappresentare una tabella di record con un array di array, e saperla scorrere, filtrare, ordinare e raggruppare.

## Descrizione

### Un array di record

Quando un dato ha più campi si usa un array associativo; quando i dati sono più d'uno, si mettono in un array indicizzato. Il risultato è un **array di array**: una tabella in cui ogni elemento è una riga. Leggerai i risultati dei database proprio in questa forma.

```php
$studenti = [
    ["nome" => "Giulia", "classe" => "4AINF", "voto" => 8],
    ["nome" => "Marco",  "classe" => "4AINF", "voto" => 5],
];
echo $studenti[0]["nome"];   // Giulia
```

### Estrarre una colonna e stampare in colonne

`array_column($array, "campo")` estrae un solo campo da tutte le righe. Per stampare un testo formattato conviene **`printf`**, che usa dei segnaposto (`%s` testo, `%d` intero) con larghezza opzionale: `%-8s` allinea il testo a sinistra in 8 caratteri.

### Ordinare con `usort`

Per ordinare record in base a un campo si usa **`usort`**, che riceve una **funzione di confronto**. Si scrive spesso come **funzione freccia** `fn(...) => ...`. L'operatore `<=>` (navicella) restituisce -1, 0 o 1 a seconda che il primo valore sia minore, uguale o maggiore del secondo.

```php
usort($studenti, fn($x, $y) => $y["voto"] <=> $x["voto"]);   // dal voto più alto
```

### Raggruppare

Per raggruppare si crea un array associativo vuoto e si aggiunge ogni elemento nel gruppo giusto con `$gruppi[$chiave][] = $valore;`: PHP crea da solo i gruppi che mancano.

## Suggerimenti

- Per accedere a un campo di una riga: `$s["nome"]` (non `$s->nome`: quella è un'altra sintassi che qui non serve).
- `usort` modifica l'array originale: se ti serve anche l'ordine di partenza, lavora su una copia.
- Per ordinare dal più grande al più piccolo scambia i due operandi di `<=>`.
- Estensione: calcola la media dei voti per ogni classe.

## Soluzione

```php
--8<-- "PHP/Array-di-array/index.php"
```

<div class="oc-embed"
     data-path="PHP/Array-di-array/index.php"
     data-lang="php"
     data-height="600"
     data-autorun="true">
</div>
