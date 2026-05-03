# Diagonale del rettangolo

Dati l'area e l'altezza di un rettangolo, il programma determina la lunghezza della diagonale.

## Obiettivo

Ricavare la base del rettangolo dall'area e dall'altezza, quindi calcolare la diagonale con il teorema di Pitagora.

## Descrizione

La diagonale di un rettangolo è il segmento che collega due vertici opposti. Per calcolarla si applica il teorema di Pitagora al triangolo rettangolo formato dalla base, dall'altezza e dalla diagonale stessa:

$$d = \sqrt{b^2 + h^2}$$

Poiché l'area è nota (\(A = b \cdot h\)), la base si ricava come:

$$b = \frac{A}{h}$$

## Suggerimenti

- Includi la libreria `<math.h>` per usare la funzione `sqrt()`, che calcola la radice quadrata.
- Non dimenticare di ricavare prima la base dalla formula \(b = A / h\) prima di calcolare la diagonale.
- Presta attenzione al caso in cui l'altezza sia zero: causerebbe una divisione per zero. Per ora puoi supporre che l'utente inserisca valori validi.
- Prova con area = 12 e altezza = 3: la base è 4, la diagonale è \(\sqrt{16 + 9} = 5.0000\).

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Diagonale del rettangolo</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CiNpbmNsdWRlIDxtYXRoLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBhcmVhLCBhbHRlenphLCBiYXNlLCBkaWFnb25hbGU7CiAgICBwcmludGYoIkluc2VyaXNjaSBsJ2FyZWEgZGVsIHJldHRhbmdvbG86ICIpOwogICAgc2NhbmYoIiVsZiIsICZhcmVhKTsKICAgIHByaW50ZigiSW5zZXJpc2NpIGwnYWx0ZXp6YSBkZWwgcmV0dGFuZ29sbzogIik7CiAgICBzY2FuZigiJWxmIiwgJmFsdGV6emEpOwogICAgYmFzZSA9IGFyZWEgLyBhbHRlenphOwogICAgZGlhZ29uYWxlID0gc3FydChiYXNlICogYmFzZSArIGFsdGV6emEgKiBhbHRlenphKTsKICAgIHByaW50ZigiTGEgZGlhZ29uYWxlIGUnOiAlLjRmXG4iLCBkaWFnb25hbGUpOwogICAgcmV0dXJuIDA7Cn0K"
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CiNpbmNsdWRlIDxtYXRoLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBhcmVhLCBhbHRlenphLCBiYXNlLCBkaWFnb25hbGU7CiAgICBwcmludGYoIkluc2VyaXNjaSBsJ2FyZWEgZGVsIHJldHRhbmdvbG86ICIpOwogICAgc2NhbmYoIiVsZiIsICZhcmVhKTsKICAgIHByaW50ZigiSW5zZXJpc2NpIGwnYWx0ZXp6YSBkZWwgcmV0dGFuZ29sbzogIik7CiAgICBzY2FuZigiJWxmIiwgJmFsdGV6emEpOwogICAgYmFzZSA9IGFyZWEgLyBhbHRlenphOwogICAgZGlhZ29uYWxlID0gc3FydChiYXNlICogYmFzZSArIGFsdGV6emEgKiBhbHRlenphKTsKICAgIHByaW50ZigiTGEgZGlhZ29uYWxlIGUnOiAlLjRmXG4iLCBkaWFnb25hbGUpOwogICAgcmV0dXJuIDA7Cn0K"
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Diagonale del rettangolo"
  ></iframe>
</div>
