const testo = document.getElementById("testo");
const numero = document.getElementById("numero");
const contatore = document.getElementById("contatore");
const maiuscolo = document.getElementById("maiuscolo");

// Aggiorna tutto ciò che dipende dal testo scritto
function aggiorna() {
  const lunghezza = testo.value.length;

  numero.textContent = lunghezza;
  maiuscolo.textContent = testo.value.toUpperCase();

  if (lunghezza > 100) {
    contatore.className = "oltre";
  } else {
    contatore.className = "";
  }
}

// L'evento "input" scatta a ogni modifica del contenuto
testo.addEventListener("input", aggiorna);
