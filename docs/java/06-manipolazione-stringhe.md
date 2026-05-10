# Manipolazione stringhe

Esercizio avanzato sui metodi statici: un menù per lavorare su due stringhe con operazioni di interleaving, raccolta caratteri unici e ordinamento.

## Obiettivo

Realizzare un programma con menù che permetta di: inserire due stringhe, crearne una terza "a pettine" (caratteri alternati), ricavarne una quarta con tutti i caratteri distinti, e infine ordinarla alfabeticamente.

## Descrizione

L'esercizio combina diversi concetti:

**Interleaving (pettine):** si scorrono entrambe le stringhe in parallelo fino alla lunghezza della più lunga, prendendo un carattere alla volta da ciascuna. Si usa `Math.max(s1.length(), s2.length())` per determinare il numero di iterazioni e un controllo `i < s.length()` prima di accedere al carattere.

**Caratteri unici:** si costruisce una stringa di accumulo partendo vuota; per ogni carattere delle due stringhe originali, lo si aggiunge solo se non è già presente (`!diverso.contains("" + c)`).

**Ordinamento di una stringa:** `String` non ha un metodo di ordinamento diretto, ma si può convertire in `char[]`, ordinare con `Arrays.sort()`, e ricostruire con `new String(charArray)`.

## Suggerimenti

- `String.charAt(i)` restituisce un `char`; per confrontarlo con `contains()` è necessario convertirlo in `String` con `"" + c`.
- `Arrays.sort()` richiede l'import `java.util.Arrays`.
- Tieni lo stato delle due stringhe in variabili locali al metodo `mostraMenu()` e passale come parametri ai metodi che le usano.
- Verifica che le stringhe siano state inserite prima di richiamare le opzioni 2, 3, 4.

## Soluzione

```java
--8<-- "Java/Manipolazione-stringhe/EsercizioStringhe.java"
```

<div class="oc-embed"
     data-path="Java/Manipolazione-stringhe/EsercizioStringhe.java"
     data-lang="java"
     data-stdin="1\nciao\nmondo\n2\n3\n4\n5\n"
	 data-autorun="true"
     data-height="550">
</div>
