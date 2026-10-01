// Funzione chiamata dal pulsante "Calcola la media"
function calcolaMedia() {
  const voto1 = Number(document.getElementById("voto1").value);
  const voto2 = Number(document.getElementById("voto2").value);
  const voto3 = Number(document.getElementById("voto3").value);
  const risultato = document.getElementById("risultato");

  if (voto1 < 0 || voto1 > 10 ||
      voto2 < 0 || voto2 > 10 ||
      voto3 < 0 || voto3 > 10) {
    risultato.textContent = "Inserisci voti tra 0 e 10";
    risultato.className = "";
  } else {
    const media = (voto1 + voto2 + voto3) / 3;
    let giudizio;
    let colore;

    if (media < 4) {
      giudizio = "gravemente insufficiente";
      colore = "rosso";
    } else if (media < 6) {
      giudizio = "insufficiente";
      colore = "rosso";
    } else if (media < 7) {
      giudizio = "sufficiente";
      colore = "arancione";
    } else if (media < 8.5) {
      giudizio = "buono";
      colore = "verde";
    } else {
      giudizio = "ottimo";
      colore = "verde";
    }

    risultato.textContent = "Media: " + media.toFixed(1) + " – " + giudizio;
    risultato.className = colore;
  }
}
