// Stato del gioco
let segreto = 0;
let tentativi = 0;

const campo = document.getElementById("tentativo");
const suggerimento = document.getElementById("suggerimento");
const contatore = document.getElementById("tentativi");
const pulsanteProva = document.getElementById("prova");

function nuovaPartita() {
  segreto = Math.floor(Math.random() * 100) + 1;
  tentativi = 0;

  contatore.textContent = tentativi;
  suggerimento.textContent = "";
  campo.value = "";
  pulsanteProva.disabled = false;
  campo.focus();
}

function prova() {
  const numero = Number(campo.value);
  tentativi = tentativi + 1;
  contatore.textContent = tentativi;

  if (numero === segreto) {
    suggerimento.textContent = "Hai indovinato in " + tentativi + " tentativi!";
    pulsanteProva.disabled = true;
  } else if (numero < segreto) {
    suggerimento.textContent = "Troppo basso";
  } else {
    suggerimento.textContent = "Troppo alto";
  }

  campo.value = "";
  campo.focus();
}

pulsanteProva.addEventListener("click", prova);
document.getElementById("nuova").addEventListener("click", nuovaPartita);

nuovaPartita();   // la prima partita parte all'apertura della pagina
