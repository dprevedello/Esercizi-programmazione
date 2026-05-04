# Test anno bisestile

Il programma chiede all'utente un numero intero che rappresenta un anno e verifica se esso è bisestile.

## Obiettivo

Leggere un anno da tastiera e stabilire se è bisestile, applicando la regola del calendario gregoriano.

## Descrizione

Nel calendario gregoriano, un anno è **bisestile** se rispetta le seguenti regole:

1. È divisibile per 4, **e**
2. Non è divisibile per 100, **oppure** è divisibile per 400.

In forma di espressione logica:

```
(anno % 4 == 0 && anno % 100 != 0) || (anno % 400 == 0)
```

Esempi:

- 2024 è bisestile (divisibile per 4, non per 100)
- 1900 **non** è bisestile (divisibile per 100, ma non per 400)
- 2000 è bisestile (divisibile per 400)

## Suggerimenti

- Scrivi la condizione usando gli operatori `&&`, `||` e `!=` come mostrato sopra, facendo attenzione alle parentesi per rispettare la precedenza degli operatori.
- In alternativa, puoi usare `if-else` annidati: prima controlla la divisibilità per 400, poi per 100, infine per 4.
- Testa il programma con gli anni 2000, 1900, 2024 e 2023 per verificare tutti i casi.
- Gli anni negativi non esistono nel calendario gregoriano: potresti aggiungere un controllo sull'input.

## Soluzione

```c
--8<-- "C/Test-anno-bisestile/main.c"
```

<div class="oc-embed"
     data-path="C/Test-anno-bisestile/main.c"
     data-lang="c">
</div>
