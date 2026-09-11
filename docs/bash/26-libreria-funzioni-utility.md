# Libreria di funzioni di utilità

Scrivi uno script Bash con tre funzioni distinte — calcolo del quadrato, controllo di parità e saluto — e usale insieme per elaborare una serie di numeri.

## Obiettivo

Scrivere tre funzioni di utilità (calcolo del quadrato, controllo di parità, saluto) e usarle insieme per elaborare una serie di numeri.

## Descrizione

Uno script può contenere **più funzioni**, ciascuna dedicata a un compito specifico: è la base per organizzare codice riutilizzabile, come una piccola libreria.

In Bash esistono due modi comuni per "ottenere un risultato" da una funzione:

- **Stampare** il risultato con `echo` e catturarlo con la **command substitution** `$(...)`, utile quando il risultato è un valore (numero, testo):

    ```bash
    q=$(quadrato "$n")
    ```

- Usare il **codice di uscita** (`return`, o il risultato di `(( ... ))`), utile quando il risultato è vero/falso:

    ```bash
    if e_pari "$n"; then ...
    ```

## Suggerimenti

- `(( n % 2 == 0 ))` da sola, come ultima istruzione di una funzione, restituisce automaticamente un codice di uscita 0 (vero) o 1 (falso): non serve un `return` esplicito.
- Definisci le funzioni **prima** di usarle nello script: Bash le esegue in ordine, dall'alto verso il basso.
- Estensione: aggiungi una funzione `cubo` che calcoli il cubo di un numero, seguendo lo stesso schema di `quadrato`.

## Soluzione

```bash
--8<-- "Bash/Libreria-funzioni-utility/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Libreria-funzioni-utility/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
