const celle = document.getElementsByClassName("cella");
const stato = document.getElementById("stato");

// Le otto combinazioni vincenti (indici delle celle)
const combinazioni = [
  [0, 1, 2], [3, 4, 5], [6, 7, 8],   // righe
  [0, 3, 6], [1, 4, 7], [2, 5, 8],   // colonne
  [0, 4, 8], [2, 4, 6]               // diagonali
];

// Stato del gioco
let tavola = ["", "", "", "", "", "", "", "", ""];
let turno = "X";
let mosse = 0;
let finito = false;

// Restituisce l'indice della combinazione vincente, oppure -1 se nessuno ha vinto
function cercaVittoria() {
  for (let k = 0; k < combinazioni.length; k++) {
    const c = combinazioni[k];
    if (tavola[c[0]] !== "" &&
        tavola[c[0]] === tavola[c[1]] &&
        tavola[c[0]] === tavola[c[2]]) {
      return k;
    }
  }
  return -1;
}

function nuovaPartita() {
  tavola = ["", "", "", "", "", "", "", "", ""];
  turno = "X";
  mosse = 0;
  finito = false;

  for (let i = 0; i < celle.length; i++) {
    celle[i].textContent = "";
    celle[i].disabled = false;
    celle[i].className = "cella";
  }

  stato.textContent = "Tocca a X";
}

function gioca(i) {
  if (finito || tavola[i] !== "") {
    return;
  }

  tavola[i] = turno;
  celle[i].textContent = turno;
  celle[i].disabled = true;
  mosse = mosse + 1;

  const vittoria = cercaVittoria();

  if (vittoria !== -1) {
    stato.textContent = "Ha vinto " + turno + "!";
    finito = true;

    // Estensione: evidenzia le tre celle vincenti
    const c = combinazioni[vittoria];
    for (let k = 0; k < 3; k++) {
      celle[c[k]].className = "cella vincente";
    }
  } else if (mosse === 9) {
    stato.textContent = "Pareggio!";
    finito = true;
  } else {
    if (turno === "X") {
      turno = "O";
    } else {
      turno = "X";
    }
    stato.textContent = "Tocca a " + turno;
  }
}

document.getElementById("nuova").addEventListener("click", nuovaPartita);
