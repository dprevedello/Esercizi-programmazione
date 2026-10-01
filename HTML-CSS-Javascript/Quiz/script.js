const domande = [
  "Quale tag HTML crea un collegamento?",
  "Quale proprietà CSS cambia il colore del testo?",
  "Come si scrive un commento su una riga in JavaScript?",
  "Quale parola chiave dichiara una variabile il cui valore non cambia?",
  "Quale funzione cerca un elemento tramite il suo id?"
];

// Una riga per domanda, quattro risposte per riga
const opzioni = [
  ["<link>", "<a>", "<href>", "<url>"],
  ["color", "font-color", "text-style", "background"],
  ["<!-- commento -->", "# commento", "// commento", "** commento"],
  ["let", "const", "var", "fixed"],
  ["findElement", "selectById", "getById", "getElementById"]
];

// Indice della risposta giusta per ogni domanda
const giuste = [1, 0, 2, 1, 3];

// Stato del quiz
let corrente = 0;
let punti = 0;

function mostraDomanda() {
  document.getElementById("domanda").textContent = (corrente + 1) + ". " + domande[corrente];

  for (let k = 0; k < 4; k++) {
    const bottone = document.getElementById("r" + k);
    bottone.textContent = opzioni[corrente][k];
    bottone.disabled = false;
    bottone.className = "";
  }

  document.getElementById("feedback").textContent = "";
  document.getElementById("avanti").hidden = true;
}

function rispondi(scelta) {
  if (scelta === giuste[corrente]) {
    punti = punti + 1;
    document.getElementById("feedback").textContent = "Esatto!";
  } else {
    document.getElementById("r" + scelta).className = "sbagliata";
    document.getElementById("feedback").textContent = "Sbagliato!";
  }

  document.getElementById("r" + giuste[corrente]).className = "giusta";

  for (let k = 0; k < 4; k++) {
    document.getElementById("r" + k).disabled = true;
  }

  document.getElementById("punteggio").textContent = "Punteggio: " + punti;
  document.getElementById("avanti").hidden = false;
}

function avanti() {
  corrente = corrente + 1;

  if (corrente === domande.length) {
    document.getElementById("domanda").textContent =
      "Quiz finito! Hai totalizzato " + punti + " su " + domande.length + ".";

    for (let k = 0; k < 4; k++) {
      document.getElementById("r" + k).hidden = true;
    }
    document.getElementById("feedback").textContent = "";
    document.getElementById("avanti").hidden = true;
  } else {
    mostraDomanda();
  }
}

mostraDomanda();
