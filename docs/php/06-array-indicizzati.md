# Array indicizzati

Scrivi uno script PHP che memorizzi in un array i voti `7, 5.5, 8, 6, 9, 4.5, 7.5` e stampi: numero di voti, primo e ultimo voto, somma, media (arrotondata a due decimali), massimo e minimo. Poi aggiungi due voti in coda, cerca un 10, ordina i voti dal più basso e dal più alto, estrai i tre migliori e segnala le insufficienze con la loro posizione.

## Obiettivo

Creare e usare array indicizzati, con le funzioni predefinite di PHP per contarli, ordinarli e cercare al loro interno.

## Descrizione

### Creare e leggere un array

Un **array** è un elenco di valori. Quelli **indicizzati** hanno come chiave un numero intero che parte da **0**. Si crea con le parentesi quadre, si legge con `$array[indice]` e si aggiunge in coda con `$array[] = valore`. Un array in PHP può mescolare tipi diversi e cresce da solo: non serve dichiararne la dimensione.

```php
$voti = [7, 5.5, 8];
echo $voti[0];        // 7
$voti[] = 10;         // aggiunge in coda
echo count($voti);    // 4
```

### Funzioni predefinite sugli array

PHP ha centinaia di funzioni per lavorare con gli array. Le più usate:

| Funzione | Cosa fa |
|----------|---------|
| `count($a)` | numero di elementi |
| `array_sum($a)`, `max($a)`, `min($a)` | somma, massimo, minimo |
| `in_array($v, $a)` | `true` se il valore è presente |
| `array_search($v, $a)` | posizione del valore (o `false`) |
| `sort($a)`, `rsort($a)` | ordina crescente / decrescente, **modificando** l'array |
| `array_slice($a, $da, $quanti)` | estrae una porzione |
| `implode(", ", $a)` | unisce gli elementi in una stringa |

### `foreach` con l'indice

Scrivendo `foreach ($array as $posizione => $valore)` si ottengono sia la posizione sia il valore di ogni elemento.

## Suggerimenti

- Il primo elemento ha indice **0**, l'ultimo ha indice `count($array) - 1`.
- `sort()` cambia l'array originale: se ti serve anche l'ordine di partenza, lavora su una copia (`$ordinati = $voti;`).
- `array_search` restituisce `false` se non trova nulla: confrontalo con `===`, perché la posizione `0` è un valore valido.
- Estensione: calcola quanti voti sono sufficienti e quanti no con un solo `foreach`.

## Soluzione

```php
--8<-- "PHP/Array-indicizzati/index.php"
```

<div class="oc-embed"
     data-path="PHP/Array-indicizzati/index.php"
     data-lang="php"
     data-height="550"
     data-autorun="true">
</div>
