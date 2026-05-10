# Conteggio vocali

Leggere una stringa da tastiera e contare le vocali presenti tramite un metodo statico.

## Obiettivo

Implementare un metodo statico `contaVocali(String testo)` che restituisce il numero di vocali (maiuscole e minuscole) contenute nella stringa passata come argomento.

## Descrizione

La classe `String` di Java offre numerosi metodi utili per lavorare con il testo. In questo esercizio ne usiamo due:

- `str.length()` — restituisce il numero di caratteri della stringa.
- `str.substring(i, i + 1)` — estrae la sottostringa di un carattere alla posizione `i` (equivalente a leggere il carattere con `str.charAt(i)`).
- `str.contains(s)` — restituisce `true` se la stringa contiene la sottostringa `s`.

Per gestire sia maiuscole sia minuscole si costruisce una stringa di riferimento `"aeiouAEIOU"` e si verifica se ciascun carattere vi appartiene.

## Suggerimenti

- Firma del metodo: `public static int contaVocali(String str)`.
- In alternativa a `substring + contains` si può usare `indexOf`: `vocali.indexOf(c) != -1`.
- `Scanner.nextLine()` legge l'intera riga inclusi gli spazi; `nextLine()` deve essere usato al posto di `next()` per leggere frasi intere.

## Soluzione

```java
--8<-- "Java/Conteggio-vocali/ContaVocali.java"
```

<div class="oc-embed"
     data-path="Java/Conteggio-vocali/ContaVocali.java"
     data-lang="java"
     data-stdin="Ciao Mondo"
     data-autorun="true">
</div>
