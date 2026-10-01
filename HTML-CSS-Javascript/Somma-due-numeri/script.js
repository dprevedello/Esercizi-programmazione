// Funzione chiamata dal pulsante "Calcola"
function somma() {
  const primo = Number(document.getElementById("num1").value);
  const secondo = Number(document.getElementById("num2").value);
  const totale = primo + secondo;

  document.getElementById("risultato").textContent = "La somma è " + totale;
}
