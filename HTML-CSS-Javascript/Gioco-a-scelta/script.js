const parole = ["ALGORITMO", "VARIABILE", "FUNZIONE", "BROWSER", "COMPILATORE",
                "TASTIERA", "INTERNET", "PROGRAMMA", "STRINGA", "CICLO"];
const alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

// Stato del gioco
let parola = "";
let trovate = "";    // lettere indovinate finora, di seguito (es. "AIO")
let vite = 6;
let finito = false;

// Crea i 26 pulsanti delle lettere con un ciclo
function disegnaTastiera() {
  let tasti = "";

  for (let i = 0; i < alfabeto.length; i++) {
    const lettera = alfabeto[i];
    tasti = tasti + `<button id="tasto-${lettera}" onclick="prova('${lettera}')">${lettera}</button>`;
  }

  document.getElementById("tastiera").innerHTML = tasti;
}

// Restituisce la parola con "_" al posto delle lettere ancora nascoste
function costruisciMaschera() {
  let maschera = "";

  for (let i = 0; i < parola.length; i++) {
    if (trovate.includes(parola[i])) {
      maschera = maschera + parola[i] + " ";
    } else {
      maschera = maschera + "_ ";
    }
  }

  return maschera;
}

function aggiorna() {
  const maschera = costruisciMaschera();
  const esito = document.getElementById("esito");

  document.getElementById("parola").textContent = maschera;
  document.getElementById("vite").textContent = "Vite: " + "❤️".repeat(vite);

  if (!maschera.includes("_")) {
    esito.textContent = "Hai vinto!";
    finito = true;
  } else if (vite === 0) {
    esito.textContent = "Hai perso! La parola era " + parola + ".";
    finito = true;
  }
}

// Chiamata da ogni pulsante-lettera
function prova(lettera) {
  if (finito) {
    return;
  }

  document.getElementById("tasto-" + lettera).disabled = true;

  if (parola.includes(lettera)) {
    trovate = trovate + lettera;
  } else {
    vite = vite - 1;
  }

  aggiorna();
}

function nuovaPartita() {
  parola = parole[Math.floor(Math.random() * parole.length)];
  trovate = "";
  vite = 6;
  finito = false;

  document.getElementById("esito").textContent = "";
  disegnaTastiera();
  aggiorna();
}

document.getElementById("nuova").addEventListener("click", nuovaPartita);

nuovaPartita();
