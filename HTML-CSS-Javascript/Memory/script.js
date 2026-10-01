const carte = document.getElementsByClassName("carta");
const info = document.getElementById("info");

// Stato del gioco
let valori = [];
let prima = -1;        // indice della prima carta scoperta (-1 = nessuna)
let seconda = -1;      // indice della seconda carta scoperta
let bloccato = false;  // true mentre due carte diverse aspettano di essere ricoperte
let mosse = 0;
let coppie = 0;

function mescola() {
  valori = ["🐶", "🐶", "🐱", "🐱", "🦊", "🦊", "🐼", "🐼", "🐸", "🐸", "🦁", "🦁"];

  for (let i = valori.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    const temp = valori[i];
    valori[i] = valori[j];
    valori[j] = temp;
  }
}

function nuovaPartita() {
  mescola();
  prima = -1;
  seconda = -1;
  bloccato = false;
  mosse = 0;
  coppie = 0;

  for (let i = 0; i < carte.length; i++) {
    carte[i].textContent = "?";
    carte[i].disabled = false;
  }

  info.textContent = "Mosse: 0";
}

// Chiamata da setTimeout: ricopre le due carte diverse
function copriCarte() {
  carte[prima].textContent = "?";
  carte[prima].disabled = false;
  carte[seconda].textContent = "?";
  carte[seconda].disabled = false;

  prima = -1;
  seconda = -1;
  bloccato = false;
}

function giraCarta(i) {
  if (bloccato) {
    return;
  }

  carte[i].textContent = valori[i];
  carte[i].disabled = true;

  if (prima === -1) {
    prima = i;           // è la prima carta della mossa
    return;
  }

  // seconda carta della mossa
  seconda = i;
  mosse = mosse + 1;
  info.textContent = "Mosse: " + mosse;

  if (valori[prima] === valori[seconda]) {
    coppie = coppie + 1;
    prima = -1;
    seconda = -1;

    if (coppie === 6) {
      info.textContent = "Hai vinto in " + mosse + " mosse!";
    }
  } else {
    bloccato = true;
    setTimeout(copriCarte, 800);
  }
}

document.getElementById("nuova").addEventListener("click", nuovaPartita);

nuovaPartita();
