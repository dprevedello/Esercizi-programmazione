# Menù interattivo

Strutturare un programma con un menù testuale che si ripete, delegando ogni funzionalità a un metodo statico dedicato.

## Obiettivo

Realizzare un metodo `visualizzaMenu()` che mostra un menù con tre opzioni (somma, conteggio vocali, uscita), legge la scelta dell'utente e invoca il metodo corrispondente, ripetendo il ciclo finché non si sceglie di uscire.

## Descrizione

Il **menù interattivo** è un pattern ricorrente nelle applicazioni console. Si basa su un ciclo `do-while` che continua finché l'utente non seleziona l'opzione di uscita, e su uno `switch` che smista l'esecuzione verso il metodo giusto.

Un dettaglio tecnico importante: dopo aver letto un intero con `in.nextInt()`, nel buffer di input rimane il carattere di newline `\n`. Se subito dopo si chiama `in.nextLine()`, questa legge una stringa vuota. La soluzione è inserire una chiamata "di pulizia":

```java
scelta = in.nextInt();
in.nextLine(); // consuma il newline residuo
```

## Suggerimenti

- Ogni opzione del menù corrisponde a un metodo statico separato: `somma()`, `contaVocali()`.
- Il `default` dello `switch` gestisce input non previsti.
- Usare `System.out.println()` con una riga vuota migliora la leggibilità dell'output.
- La condizione del `do-while` è `scelta != 3` (o il numero dell'opzione di uscita).

## Soluzione

```java
--8<-- "Java/Menu-interattivo/Menu.java"
```

<div class="oc-embed"
     data-path="Java/Menu-interattivo/Menu.java"
     data-lang="java"
     data-stdin="1\n10\n5\n2\nCiao Mondo\n3\n"
     data-autorun="true">
</div>
