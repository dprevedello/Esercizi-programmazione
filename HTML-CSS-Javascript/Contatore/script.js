// Variabile globale: mantiene il valore tra un clic e l'altro
let conteggio = 0;

// Riscrive il valore nella pagina
function mostra() {
  const valore = document.getElementById("valore");
  valore.textContent = conteggio;

  // Estensione: colore rosso quando il conteggio è negativo
  if (conteggio < 0) {
    valore.className = "negativo";
  } else {
    valore.className = "";
  }
}

function aumenta() {
  conteggio = conteggio + 1;
  mostra();
}

function diminuisci() {
  conteggio = conteggio - 1;
  mostra();
}

function azzera() {
  conteggio = 0;
  mostra();
}

// Collegamento tra pulsanti e funzioni (nota: senza parentesi dopo il nome)
document.getElementById("piu").addEventListener("click", aumenta);
document.getElementById("meno").addEventListener("click", diminuisci);
document.getElementById("azzera").addEventListener("click", azzera);
