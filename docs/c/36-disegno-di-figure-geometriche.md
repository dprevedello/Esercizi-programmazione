# Disegno di figure geometriche

Leggere un numero intero N e visualizzare quattro diverse figure geometriche basate su asterischi e caratteri misti.

## Obiettivo

Il programma deve leggere un intero N e stampare le seguenti figure:

1. Un quadrato pieno di asterischi di lato N
2. Lo stesso quadrato con solo i lati (versione vuota)
3. Un triangolo rettangolo crescente di lato N
4. Un quadrato di lato N diviso diagonalmente tra caratteri `*` e `+`

<table style="display: block; margin: auto; margin-top: 1.5em;">
<tbody>
<tr style="padding-bottom: 1em;">
<td style="text-align: center; font-weight: bold;">Caso 1</td>
<td style="text-align: center; font-weight: bold;">Caso 2</td>
<td style="text-align: center; font-weight: bold;">Caso 3</td>
<td style="text-align: center; font-weight: bold;">Caso 4</td>
</tr>
<tr>
<td style="text-align: center; padding: 0.6em;">
<pre>*****<br />*****<br />*****<br />*****<br />*****</pre>
</td>
<td style="text-align: center; padding: 0.6em;">
<pre>*****<br />*   *<br />*   *<br />*   *<br />*****</pre>
</td>
<td style="text-align: center; padding: 0.6em;">
<pre>*    <br />**   <br />***  <br />**** <br />*****</pre>
</td>
<td style="text-align: center; padding: 0.6em;">
<pre>*++++<br />**+++<br />***++<br />****+<br />*****</pre>
</td>
</tr>
</tbody>
</table>

## Descrizione

Ogni figura richiede una logica diversa per decidere quale carattere stampare in ogni posizione:

1. **Quadrato pieno**: ogni cella contiene `*`.
2. **Quadrato vuoto**: si stampa `*` solo se la cella è sul bordo (prima/ultima riga o prima/ultima colonna), altrimenti uno spazio.
3. **Triangolo rettangolo**: alla riga r si stampano r asterischi. La figura cresce verso destra scendendo di riga in riga.
4. **Quadrato con caratteri misti**: si usa `*` nelle celle in cui `r >= c`, altrimenti `+`, ottenendo una divisione triangolare del quadrato.

## Suggerimenti

- Struttura il programma in quattro sezioni distinte, ognuna con il proprio doppio ciclo `for`.
- Per il triangolo, il ciclo interno stampa un numero di asterischi pari al numero della riga corrente.
- Per il quadrato con caratteri misti, confronta riga e colonna (`r >= c`) per decidere quale carattere stampare.
- Separa le figure con una riga vuota e un'intestazione (es. "Figura 1:") per rendere l'output più chiaro.

## Soluzione

```c
--8<-- "C/Disegno-di-figure-geometriche/main.c"
```

<div class="oc-embed"
     data-path="C/Disegno-di-figure-geometriche/main.c"
     data-lang="c">
</div>
