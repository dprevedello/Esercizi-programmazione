# Stringhe

Scrivi uno script PHP che legga una frase e ne stampi la lunghezza, il numero di parole, la versione maiuscola, minuscola, con le iniziali maiuscole e al contrario; verifichi se contiene «php» e «java» e se inizia con «Il»; sostituisca «web» con «server»; trovi la parola più lunga, ordini le parole alfabeticamente ed estragga le prime 10 lettere. Infine, con una funzione `ePalindroma`, controlli le parole «Anna», «ingegni» e «PHP».

## Obiettivo

Manipolare il testo con le funzioni predefinite di PHP per le stringhe.

## Descrizione

### Misurare e trasformare

Le funzioni più comuni: **`strlen`** (lunghezza), **`str_word_count`** (numero di parole), **`strtoupper`**, **`strtolower`**, **`ucwords`** (iniziali maiuscole), **`strrev`** (testo rovesciato) e **`substr(testo, inizio, lunghezza)`** per estrarre una porzione.

```php
strlen("PHP");              // 3
substr("linguaggio", 0, 4); // ling
```

### Cercare e sostituire

**`str_contains`**, **`str_starts_with`** e **`str_ends_with`** dicono se un testo ne contiene un altro, o inizia o finisce con esso. **`stripos`** restituisce la posizione della prima occorrenza ignorando maiuscole e minuscole, oppure `false` se non la trova. **`str_replace(cerca, sostituisci, testo)`** sostituisce tutte le occorrenze.

### Spezzare e unire

**`explode(separatore, testo)`** spezza una stringa in un array; **`implode(separatore, array)`** fa l'operazione inversa. Insieme sono lo strumento base per lavorare sulle parole di una frase o sulle righe di un file CSV.

```php
$parole = explode(" ", "Il PHP e il web");   // ["Il", "PHP", "e", "il", "web"]
```

!!! note "Caratteri accentati"
    `strlen` conta i **byte**, non le lettere: una «è» in UTF-8 ne occupa due, quindi `strlen("è")` vale 2. Per testi con accenti esistono le funzioni `mb_strlen`, `mb_strtoupper` e simili (estensione `mbstring`). Qui la frase di prova non ha accenti per tenere i conti semplici.

## Suggerimenti

- Per confrontare senza badare a maiuscole e minuscole, porta prima tutto in minuscolo con `strtolower`.
- `stripos(...) !== false` è il controllo corretto: se la parola è all'inizio `stripos` restituisce `0`, che in un `if` sarebbe falso!
- Per un palindromo basta confrontare il testo (in minuscolo) con il suo rovescio.
- Estensione: conta quante volte compare una lettera con `substr_count`.

## Soluzione

```php
--8<-- "PHP/Stringhe/index.php"
```

<div class="oc-embed"
     data-path="PHP/Stringhe/index.php"
     data-lang="php"
     data-stdin="Il PHP e un linguaggio per il web\n"
     data-height="600"
     data-autorun="true">
</div>
