# Carrello in sessione

Il file `prodotti.php` (già pronto) contiene l'array `$prodotti` con cinque articoli. Realizza un piccolo negozio: `index.php` mostra i prodotti in schede con il pulsante «Aggiungi al carrello» e il numero di articoli già nel carrello; `carrello.php` mostra il carrello in una tabella (prodotto, prezzo, quantità, subtotale), con i pulsanti per aumentare, diminuire o rimuovere un prodotto, lo svuotamento del carrello e il totale. Il carrello deve vivere nella **sessione**.

## Obiettivo

Gestire una struttura dati più complessa (un carrello) nella sessione, modificandola in risposta a moduli POST.

## Anteprima

```
index.php                                carrello.php
+---------------------------------+      +---------------------------------------------+
| Negozio di informatica          |      | Il tuo carrello                             |
| Vai al carrello (3 articoli)    |      | Prodotto     Prezzo   Q.tà  Subtotale       |
| +-----------+ +-----------+     |      | Tastiera ... € 59,90   2   € 119,80 [+][−]  |
| | Tastiera  | | Mouse     |     |      | Monitor  ... € 149,00  1   € 149,00 [+][−]  |
| | € 59,90   | | € 19,90   |     |      |                   Totale   € 268,80         |
| | [Aggiungi]| | [Aggiungi]|     |      | [ Svuota il carrello ]                      |
+---------------------------------+      +---------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `prodotti.php` | l'array `$prodotti` (fornito) |
| `index.php` | catalogo con i pulsanti di aggiunta |
| `carrello.php` | gestisce le azioni e mostra il carrello |

## Descrizione

### La struttura del carrello

Il carrello è un array **associativo** nella sessione: la chiave è il codice del prodotto, il valore è la quantità. Non serve duplicare nome e prezzo, che si recuperano da `$prodotti`: nella sessione si tiene il minimo indispensabile.

```php
$_SESSION["carrello"] = [1 => 2, 3 => 1];   // 2 pezzi del prodotto 1, 1 del prodotto 3
```

### Modificare il carrello

Aggiungere un prodotto significa incrementare la sua quantità (partendo da 0 se non c'è), diminuire significa decrementarla e **togliere** la riga con `unset` quando arriva a zero, rimuovere significa `unset` diretto, svuotare significa assegnare un array vuoto. Ogni azione arriva da un modulo POST con un campo `azione` e, se serve, l'`id` del prodotto: lo stesso modulo può avere più pulsanti con `name="azione"` e `value` diversi.

### Non fidarsi dell'identificativo

L'`id` del prodotto arriva dal browser e può essere qualsiasi cosa: prima di usarlo si converte con `(int)` e si controlla che esista in `$prodotti` (`isset($prodotti[$id])`).

### Redirect dopo l'azione

Come nell'esercizio sul modulo di contatto, dopo ogni azione si risponde con `header("Location: carrello.php")`: ricaricando la pagina (F5) l'azione non viene ripetuta.

## Suggerimenti

- Il totale si calcola con un `foreach` sul carrello, leggendo il prezzo da `$prodotti[$id]["prezzo"]`.
- Il numero di articoli nell'intestazione è `array_sum($_SESSION["carrello"] ?? [])`.
- Gestisci il carrello vuoto con un messaggio al posto della tabella.
- Estensione: aggiungi un limite di 10 pezzi per prodotto e uno sconto del 10% sopra i 200 euro.

## Soluzione

=== "carrello.php"
    ```php
    --8<-- "PHP/Carrello-sessione/carrello.php"
    ```
=== "index.php"
    ```php
    --8<-- "PHP/Carrello-sessione/index.php"
    ```
=== "prodotti.php"
    ```php
    --8<-- "PHP/Carrello-sessione/prodotti.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: cookie e sessioni esistono solo quando c'è un server che risponde a un browser, quindi OneCompiler non può eseguirlo. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
