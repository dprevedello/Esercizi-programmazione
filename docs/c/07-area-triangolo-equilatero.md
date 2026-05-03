# Area del triangolo equilatero

Dato il perimetro di un triangolo equilatero, il programma ne calcola l'area.

## Obiettivo

Ricavare il lato dal perimetro e poi calcolare l'area del triangolo equilatero con la formula apposita.

## Descrizione

Un triangolo equilatero ha tutti e tre i lati uguali. Conoscendo il perimetro \(P\), il lato vale:

$$l = \frac{P}{3}$$

L'area si calcola con la formula:

$$A = \frac{\sqrt{3}}{4} \cdot l^2$$

Questa formula si ricava applicando il teorema di Pitagora per determinare l'altezza del triangolo, che vale \(h = \frac{l\sqrt{3}}{2}\), e poi usando la formula generale dell'area \(A = \frac{b \cdot h}{2}\).

## Suggerimenti

- Includi `<math.h>` per usare `sqrt(3.0)`.
- Il calcolo è sequenziale: prima si ricava il lato, poi si applica la formula dell'area.
- Prova con perimetro = 12: il lato è 4, l'area attesa è \(\frac{\sqrt{3}}{4} \cdot 16 \approx 6.9282\).
- Il risultato ha molte cifre decimali: usa `%.4f` per stampare con quattro decimali, sufficiente per questo tipo di esercizio.

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Area del triangolo equilatero</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CiNpbmNsdWRlIDxtYXRoLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBwZXJpbWV0cm8sIGxhdG8sIGFyZWE7CiAgICBwcmludGYoIkluc2VyaXNjaSBpbCBwZXJpbWV0cm8gZGVsIHRyaWFuZ29sbyBlcXVpbGF0ZXJvOiAiKTsKICAgIHNjYW5mKCIlbGYiLCAmcGVyaW1ldHJvKTsKICAgIGxhdG8gPSBwZXJpbWV0cm8gLyAzLjA7CiAgICBhcmVhID0gKHNxcnQoMy4wKSAvIDQuMCkgKiBsYXRvICogbGF0bzsKICAgIHByaW50ZigiQXJlYSBkZWwgdHJpYW5nb2xvIGVxdWlsYXRlcm86ICUuNGZcbiIsIGFyZWEpOwogICAgcmV0dXJuIDA7Cn0K"
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CiNpbmNsdWRlIDxtYXRoLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBwZXJpbWV0cm8sIGxhdG8sIGFyZWE7CiAgICBwcmludGYoIkluc2VyaXNjaSBpbCBwZXJpbWV0cm8gZGVsIHRyaWFuZ29sbyBlcXVpbGF0ZXJvOiAiKTsKICAgIHNjYW5mKCIlbGYiLCAmcGVyaW1ldHJvKTsKICAgIGxhdG8gPSBwZXJpbWV0cm8gLyAzLjA7CiAgICBhcmVhID0gKHNxcnQoMy4wKSAvIDQuMCkgKiBsYXRvICogbGF0bzsKICAgIHByaW50ZigiQXJlYSBkZWwgdHJpYW5nb2xvIGVxdWlsYXRlcm86ICUuNGZcbiIsIGFyZWEpOwogICAgcmV0dXJuIDA7Cn0K"
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Area del triangolo equilatero"
  ></iframe>
</div>
