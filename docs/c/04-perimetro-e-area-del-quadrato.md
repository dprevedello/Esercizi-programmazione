# Perimetro e area del quadrato

Dato il lato di un quadrato, il programma calcola e stampa il suo perimetro e la sua area.

## Obiettivo

Leggere la misura del lato di un quadrato e calcolarne perimetro e area.

## Descrizione

Il quadrato è un poligono regolare con quattro lati uguali e quattro angoli retti. Date le sue proprietà, le formule per perimetro e area sono:

$$P = 4 \cdot l$$

$$A = l^2$$

dove \(l\) è la misura del lato.

## Suggerimenti

- Usa `double` per il lato: un quadrato può avere lato non intero (ad esempio 2.5 cm).
- Per elevare al quadrato in C non esiste un operatore dedicato: usa semplicemente `lato * lato`. La funzione `pow(lato, 2)` dalla libreria `<math.h>` è un'alternativa, ma per il quadrato la moltiplicazione diretta è più efficiente.
- Struttura l'output in modo chiaro, stampando prima il perimetro e poi l'area su righe separate.
- Prova con lato = 5: perimetro atteso 20.00, area attesa 25.00.

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Perimetro e area del quadrato</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBsYXRvLCBwZXJpbWV0cm8sIGFyZWE7CiAgICBwcmludGYoIkluc2VyaXNjaSBpbCBsYXRvIGRlbCBxdWFkcmF0bzogIik7CiAgICBzY2FuZigiJWxmIiwgJmxhdG8pOwogICAgcGVyaW1ldHJvID0gNCAqIGxhdG87CiAgICBhcmVhID0gbGF0byAqIGxhdG87CiAgICBwcmludGYoIlBlcmltZXRybzogJS4yZlxuIiwgcGVyaW1ldHJvKTsKICAgIHByaW50ZigiQXJlYTogJS4yZlxuIiwgYXJlYSk7CiAgICByZXR1cm4gMDsKfQo="
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBsYXRvLCBwZXJpbWV0cm8sIGFyZWE7CiAgICBwcmludGYoIkluc2VyaXNjaSBpbCBsYXRvIGRlbCBxdWFkcmF0bzogIik7CiAgICBzY2FuZigiJWxmIiwgJmxhdG8pOwogICAgcGVyaW1ldHJvID0gNCAqIGxhdG87CiAgICBhcmVhID0gbGF0byAqIGxhdG87CiAgICBwcmludGYoIlBlcmltZXRybzogJS4yZlxuIiwgcGVyaW1ldHJvKTsKICAgIHByaW50ZigiQXJlYTogJS4yZlxuIiwgYXJlYSk7CiAgICByZXR1cm4gMDsKfQo="
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Perimetro e area del quadrato"
  ></iframe>
</div>
