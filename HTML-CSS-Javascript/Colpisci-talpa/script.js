const buche = document.getElementsByClassName("buca");
const puntiSpan = document.getElementById("punti");
const tempoSpan = document.getElementById("tempo");
const esito = document.getElementById("esito");

// Stato del gioco
let punti = 0;
let tempo = 30;
let posizione = -1;      // buca in cui si trova la talpa (-1 = nessuna)
let giocando = false;
let idTempo;             // identificativo del timer del conto alla rovescia
let idTalpa;             // identificativo del timer che sposta la talpa

function togliTalpa() {
  if (posizione !== -1) {
    buche[posizione].textContent = "";
    posizione = -1;
  }
}

function muoviTalpa() {
  togliTalpa();
  posizione = Math.floor(Math.random() * 9);
  buche[posizione].textContent = "🐹";
}

function fineGioco() {
  clearInterval(idTempo);
  clearInterval(idTalpa);
  giocando = false;
  togliTalpa();
  esito.textContent = "Tempo scaduto! Hai fatto " + punti + " punti.";
}

function scorriTempo() {
  tempo = tempo - 1;
  tempoSpan.textContent = tempo;

  if (tempo === 0) {
    fineGioco();
  }
}

function inizia() {
  if (giocando) {
    return;
  }

  punti = 0;
  tempo = 30;
  giocando = true;
  puntiSpan.textContent = punti;
  tempoSpan.textContent = tempo;
  esito.textContent = "";

  idTempo = setInterval(scorriTempo, 1000);
  idTalpa = setInterval(muoviTalpa, 700);
  muoviTalpa();
}

function colpisci(i) {
  if (giocando && i === posizione) {
    punti = punti + 1;
    puntiSpan.textContent = punti;
    togliTalpa();
  }
}

document.getElementById("inizia").addEventListener("click", inizia);
