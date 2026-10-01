const facce = ["⚀", "⚁", "⚂", "⚃", "⚄", "⚅"];

// Restituisce un numero intero casuale da 1 a 6
function dadoCasuale() {
  return Math.floor(Math.random() * 6) + 1;
}

function lancia() {
  const lancio1 = dadoCasuale();
  const lancio2 = dadoCasuale();
  let messaggio = "Totale: " + (lancio1 + lancio2);

  if (lancio1 === lancio2) {
    messaggio = messaggio + " – Doppio!";
  }

  document.getElementById("dado1").textContent = facce[lancio1 - 1];
  document.getElementById("dado2").textContent = facce[lancio2 - 1];
  document.getElementById("totale").textContent = messaggio;
}

document.getElementById("lancia").addEventListener("click", lancia);
