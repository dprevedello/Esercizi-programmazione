// 0 = sasso, 1 = carta, 2 = forbici
const simboli = ["✊", "✋", "✌️"];

let punteggioUtente = 0;
let punteggioComputer = 0;

function gioca(scelta) {
  const computer = Math.floor(Math.random() * 3);
  let esito;

  if (scelta === computer) {
    esito = "Pareggio!";
  } else if ((scelta === 0 && computer === 2) ||
             (scelta === 1 && computer === 0) ||
             (scelta === 2 && computer === 1)) {
    esito = "Hai vinto!";
    punteggioUtente = punteggioUtente + 1;
  } else {
    esito = "Hai perso!";
    punteggioComputer = punteggioComputer + 1;
  }

  document.getElementById("scelte").textContent =
    "Tu: " + simboli[scelta] + " – Computer: " + simboli[computer];
  document.getElementById("esito").textContent = esito;
  document.getElementById("punteggio").textContent =
    "Tu " + punteggioUtente + " – " + punteggioComputer + " Computer";
}
