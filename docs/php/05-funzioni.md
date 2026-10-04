# Funzioni

Scrivi uno script PHP che definisca e usi le funzioni `saluta` (con un saluto predefinito «Ciao»), `ePrimo`, `fattoriale` e `conIva` (con aliquota predefinita 22), più una funzione `incrementa` che modifichi la variabile ricevuta. Stampa i numeri primi fino a 30 e mostra, con un esempio, che una variabile esterna non è visibile dentro una funzione.

## Obiettivo

Scrivere funzioni con parametri tipizzati, valori predefiniti e valore di ritorno, e capire lo scope delle variabili.

## Descrizione

### Parametri e valore di ritorno tipizzati

Una funzione si definisce con la parola **`function`**. In PHP moderno si dichiarano il **tipo dei parametri** e il **tipo del valore restituito** (dopo i due punti): PHP segnala un errore se non vengono rispettati. `void` indica che la funzione non restituisce nulla.

```php
function conIva(float $prezzo, float $aliquota = 22): float
{
    return $prezzo * (1 + $aliquota / 100);
}
echo conIva(100);       // usa 22
echo conIva(100, 10);   // usa 10
```

Il `= 22` è un **valore predefinito**: se il chiamante non passa il parametro, si usa quello.

### Passaggio per valore e per riferimento

Di norma i parametri sono passati **per valore**: la funzione lavora su una copia. Mettendo una **`&`** davanti al parametro lo si passa **per riferimento** e la funzione può modificare la variabile originale.

```php
function incrementa(int &$x): void { $x++; }
$valore = 5;
incrementa($valore);   // $valore ora vale 6
```

### Scope delle variabili

Una variabile creata **fuori** da una funzione non è visibile **dentro** di essa (e viceversa): ogni funzione ha il proprio **scope**, cioè il proprio ambito. Per dare dati a una funzione si usano i parametri, per riceverli il `return`.

## Suggerimenti

- Una funzione fa **una cosa sola** e restituisce il risultato invece di stamparlo: così puoi riusarla ovunque.
- Per verificare se un numero è primo basta provare i divisori fino alla sua radice quadrata (`$d * $d <= $n`).
- La funzione `fattoriale` si può scrivere anche in modo **ricorsivo** (richiamando sé stessa), come nell'esempio.
- Prova a togliere il tipo `int` da un parametro e a passare un testo: cosa succede? E con il tipo, in modalità predefinita?

## Soluzione

```php
--8<-- "PHP/Funzioni/index.php"
```

<div class="oc-embed"
     data-path="PHP/Funzioni/index.php"
     data-lang="php"
     data-height="450"
     data-autorun="true">
</div>
