# Simulazione di un sistema di pagamenti

Gerarchia con interfaccia, classe astratta e classi concrete che modella tre diversi metodi di pagamento.

## Obiettivo

Definire un'interfaccia `Pagamento`, una classe astratta `MetodoDiPagamento` che la implementa parzialmente, e tre classi concrete (`PagamentoCartaDiCredito`, `PagamentoPayPal`, `PagamentoBonifico`). Nel `main` creare un array polimorfico di `Pagamento` e invocare i metodi su tutti gli elementi.

## Descrizione

### Interfaccia vs classe astratta

| | Interfaccia | Classe astratta |
|---|---|---|
| Istanziabile | No | No |
| Può avere attributi | No (solo costanti) | Sì |
| Implementazione metodi | No (default a parte) | Parziale o totale |
| Ereditarietà multipla | Sì (`implements A, B`) | No (`extends` una sola) |

In questo esercizio si usano **entrambe**: l'interfaccia definisce il contratto pubblico, la classe astratta fornisce la struttura e l'attributo comune `titolareCarta`.

### Catena di responsabilità

```
«interface»          «abstract class»        concrete classes
Pagamento      ←──   MetodoDiPagamento  ←──  PagamentoCartaDiCredito
                                        ←──  PagamentoPayPal
                                        ←──  PagamentoBonifico
```

`MetodoDiPagamento` implementa `Pagamento` ma ri-dichiara i metodi come `abstract`: delega l'implementazione reale alle classi concrete. Questo permette di centralizzare il costruttore e `toString()` senza imporre la logica di pagamento.

### Array polimorfico

Il `main` usa un array di tipo `Pagamento[]`: ogni elemento può essere qualsiasi classe che implementa l'interfaccia. Il ciclo `for-each` chiama `effettuaPagamento()` su tutti senza conoscere il tipo reale — è **polimorfismo** in azione:

```java
Pagamento[] pagamenti = { new PagamentoCartaDiCredito(...), new PagamentoPayPal(...), ... };
for (Pagamento p : pagamenti)
    p.effettuaPagamento(99.90);
```

### `substring` per mascherare il numero carta

```java
numeroCarta.substring(numeroCarta.length() - 4)
```

`substring(indice)` restituisce la sottostringa dall'indice alla fine: usandolo con `length() - 4` si ottengono le ultime 4 cifre, mascherando le precedenti con `****`.

## Suggerimenti

- Il costruttore di `MetodoDiPagamento` inizializza `titolareCarta`; le classi figlie lo chiamano con `super(titolareCarta)` passando il parametro ricevuto.
- Dichiarare i metodi astratti in `MetodoDiPagamento` con `@Override public abstract` non è obbligatorio ma segnala esplicitamente che si stanno re-dichiarando metodi dell'interfaccia.
- Aggiungere una quarta classe concreta (es. `PagamentoContrassegno`) richiede solo di estendere `MetodoDiPagamento` e implementare i due metodi: il `main` funziona senza modifiche.

## Soluzione

=== "MainPagamenti.java"
    ```java
    --8<-- "Java/Sistema-pagamenti/MainPagamenti.java"
    ```

=== "Pagamento.java"
    ```java
    --8<-- "Java/Sistema-pagamenti/Pagamento.java"
    ```

=== "MetodoDiPagamento.java"
    ```java
    --8<-- "Java/Sistema-pagamenti/MetodoDiPagamento.java"
    ```

=== "PagamentoCartaDiCredito.java"
    ```java
    --8<-- "Java/Sistema-pagamenti/PagamentoCartaDiCredito.java"
    ```

=== "PagamentoPayPal.java"
    ```java
    --8<-- "Java/Sistema-pagamenti/PagamentoPayPal.java"
    ```

=== "PagamentoBonifico.java"
    ```java
    --8<-- "Java/Sistema-pagamenti/PagamentoBonifico.java"
    ```

<div class="oc-embed"
     data-path="Java/Sistema-pagamenti/MainPagamenti.java; Java/Sistema-pagamenti/Pagamento.java; Java/Sistema-pagamenti/MetodoDiPagamento.java; Java/Sistema-pagamenti/PagamentoCartaDiCredito.java; Java/Sistema-pagamenti/PagamentoPayPal.java; Java/Sistema-pagamenti/PagamentoBonifico.java"
     data-lang="java">
</div>
