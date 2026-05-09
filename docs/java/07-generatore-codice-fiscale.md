# Generatore di Codice Fiscale (semplificato)

Progetto Javadoc: calcolare un codice fiscale a partire da nome, cognome, data di nascita, sesso e comune. Tutti i metodi sono corredati da commenti Javadoc.

## Obiettivo

Realizzare un programma Java che chieda all'utente i dati anagrafici, calcoli il codice fiscale completo applicando le regole ufficiali semplificate e lo stampi a video. Ogni metodo e la classe principale sono documentati con commenti Javadoc (`/** ... */`).

## Descrizione

### Struttura del codice fiscale

Il codice fiscale italiano è composto da **16 caratteri**:

| Posizioni | Contenuto | Esempio |
|-----------|-----------|---------|
| 1–3 | Cognome (consonanti poi vocali, poi X) | `PRV` |
| 4–6 | Nome (consonanti poi vocali, poi X) | `DNL` |
| 7–8 | Anno di nascita (ultime 2 cifre) | `85` |
| 9 | Mese di nascita (lettera) | `T` |
| 10–11 | Giorno (uomini: gg; donne: gg+40) | `20` |
| 12–15 | Codice catastale del comune | `H501` |
| 16 | Carattere di controllo | `A` |

La **lettera del mese** segue questa codifica:

| Gen | Feb | Mar | Apr | Mag | Giu | Lug | Ago | Set | Ott | Nov | Dic |
|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|
| A   | B   | C   | D   | E   | H   | L   | M   | P   | R   | S   | T   |

Il **carattere di controllo** si calcola su 15 caratteri con tabelle diverse per posizioni pari e dispari, poi `somma % 26` → lettera.

### Javadoc

I commenti Javadoc si scrivono con `/** ... */` prima della dichiarazione del metodo o della classe:

```java
/**
 * Estrae le consonanti presenti in una stringa, in ordine di apparizione.
 *
 * @param s la stringa da analizzare
 * @return stringa contenente solo le consonanti, in maiuscolo
 */
public static String estraiConsonanti(String s) { ... }
```

I tag principali:

| Tag | Scopo |
|-----|-------|
| `@param nome desc` | Descrive un parametro |
| `@return desc` | Descrive il valore restituito |
| `@throws Tipo desc` | Documenta le eccezioni |
| `@author nome` | Autore della classe |
| `@version x.y` | Versione |

Per generare la documentazione HTML:

```bash
javadoc -d doc CodiceFiscale.java
```

### Validazione con espressioni regolari

`String.matches()` confronta l'intera stringa con un pattern:

```java
if (!data.matches("\\d{2}/\\d{2}/\\d{4}"))
    System.out.println("Formato non valido.");
```

- `\\d` → una cifra decimale  
- `{n}` → esattamente *n* ripetizioni  
- Il doppio `\\` è necessario perché il backslash va escaped nelle stringhe Java

### Algoritmo del carattere di controllo

I 15 caratteri vengono processati con tabelle diverse a seconda della posizione (contata da 1):

- **Posizione dispari** (1ª, 3ª, …): valori non standard da tabella ufficiale  
- **Posizione pari** (2ª, 4ª, …): per le lettere vale `c - 'A'` (A=0, B=1, …); per le cifre il valore facciale

Somma di tutti i valori → `somma % 26` → lettera corrispondente.

## Suggerimenti

- `replaceAll("[^A-Z]", "")` rimuove tutto ciò che non è una lettera maiuscola: utile per normalizzare l'input prima di estrarre consonanti e vocali.
- `String.format("%02d", n)` formatta un intero con almeno 2 cifre, aggiungendo lo zero iniziale se necessario.
- `HashMap.getOrDefault(chiave, "XXXX")` restituisce il valore associato alla chiave oppure il default se non presente.
- Separa l'input con validazione in metodi dedicati (`leggiData`, `leggiSesso`) per mantenere il `main` pulito.

## Soluzione

```java
--8<-- "Java/Generatore-codice-fiscale/CodiceFiscale.java"
```

<div class="oc-embed"
     data-path="Java/Generatore-codice-fiscale/CodiceFiscale.java"
     data-lang="java">
</div>
