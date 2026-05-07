---
icon: material/language-php
---

# :material-language-php: PHP

**PHP** (Hypertext Preprocessor) è un linguaggio di scripting lato server,
nato per il web e ancora oggi tra i più usati: WordPress, Wikipedia e moltissimi
altri siti girano su PHP.

Con PHP puoi costruire pagine web dinamiche, gestire form, interagire con un
database e molto altro.

---

## Cosa imparerai

- Sintassi base: variabili, tipi, operatori
- Output: `echo` e `print`
- Strutture di controllo: `if`, `switch`, `for`, `foreach`, `while`
- Array (indicizzati e associativi) e funzioni predefinite
- Funzioni personalizzate e scope delle variabili
- Form HTML e gestione con `$_GET` / `$_POST`
- Sessioni e cookie (`$_SESSION`, `$_COOKIE`)
- Interazione con il database tramite PDO o MySQLi
- Lettura e scrittura di file

---

## Esercizi disponibili

!!! info "In costruzione"
    Gli esercizi verranno aggiunti progressivamente.

| # | Titolo | Argomento | Difficoltà |
|---|--------|-----------|------------|
| 01 | *(in arrivo)* | `echo`, variabili e tipi | :material-circle-outline: Base |
| 02 | *(in arrivo)* | Array e ciclo `foreach` | :material-circle-outline: Base |
| 03 | *(in arrivo)* | Form con `$_POST` | :material-circle-slice-4: Intermedio |
| 04 | *(in arrivo)* | Validazione input | :material-circle-slice-4: Intermedio |
| 05 | *(in arrivo)* | Sessioni e login semplice | :material-circle: Avanzato |
| 06 | *(in arrivo)* | Connessione al database (PDO) | :material-circle: Avanzato |

---

## Eseguire PHP in locale

=== "Con PHP integrato"

    ```bash
    # Avvia il server di sviluppo integrato
    php -S localhost:8000

    # Poi apri il browser su http://localhost:8000
    ```

=== "Con XAMPP / WAMP"

    Installa [XAMPP](https://www.apachefriends.org) (Windows/Mac/Linux)
    o [WAMP](https://www.wampserver.com) (solo Windows), metti i file PHP
    nella cartella `htdocs/` e avvia Apache dal pannello di controllo.

!!! note "Versione consigliata"
    Gli esercizi sono compatibili con **PHP 8.x**.
    Verifica la tua versione con `php --version`.

---

## Risorse utili

- [php.net/manual](https://www.php.net/manual/it/) — manuale ufficiale in italiano
- [W3Schools PHP](https://www.w3schools.com/php/) — riferimento rapido con esempi
