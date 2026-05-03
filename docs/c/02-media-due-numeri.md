# Media di due numeri

Dati due numeri inseriti da tastiera, il programma calcola e visualizza la loro media aritmetica.

## Obiettivo

Acquisire due valori numerici dall'utente e stamparne la media aritmetica.

## Descrizione

La media aritmetica di due numeri \(a\) e \(b\) è definita come:

$$m = \frac{a + b}{2}$$

Il programma deve leggere i due valori tramite `scanf()`, calcolare la media e stamparla con `printf()`.

## Suggerimenti

- Usa il tipo `double` per gestire correttamente i numeri decimali: la media di 3 e 4, ad esempio, è 3.5.
- Con `scanf()`, il formato corretto per leggere un `double` è `%lf`; per stamparlo con `printf()` si usa `%f` oppure `%.2f` per limitare a due cifre decimali.
- Fai attenzione alla divisione intera: se `a` e `b` fossero dichiarati `int`, l'espressione `(a + b) / 2` troncherebbe il risultato. Dividendo per `2.0` si forza la divisione in virgola mobile.
- Prova il programma con coppie di valori di cui conosci già il risultato, ad esempio 10 e 20 (media attesa: 15.00).

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Media di due numeri</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBhLCBiLCBtZWRpYTsKICAgIHByaW50ZigiSW5zZXJpc2NpIGlsIHByaW1vIG51bWVybzogIik7CiAgICBzY2FuZigiJWxmIiwgJmEpOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgaWwgc2Vjb25kbyBudW1lcm86ICIpOwogICAgc2NhbmYoIiVsZiIsICZiKTsKICAgIG1lZGlhID0gKGEgKyBiKSAvIDIuMDsKICAgIHByaW50ZigiTGEgbWVkaWEgYXJpdG1ldGljYSBlJzogJS4yZlxuIiwgbWVkaWEpOwogICAgcmV0dXJuIDA7Cn0K"
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBhLCBiLCBtZWRpYTsKICAgIHByaW50ZigiSW5zZXJpc2NpIGlsIHByaW1vIG51bWVybzogIik7CiAgICBzY2FuZigiJWxmIiwgJmEpOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgaWwgc2Vjb25kbyBudW1lcm86ICIpOwogICAgc2NhbmYoIiVsZiIsICZiKTsKICAgIG1lZGlhID0gKGEgKyBiKSAvIDIuMDsKICAgIHByaW50ZigiTGEgbWVkaWEgYXJpdG1ldGljYSBlJzogJS4yZlxuIiwgbWVkaWEpOwogICAgcmV0dXJuIDA7Cn0K"
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Media di due numeri"
  ></iframe>
</div>
