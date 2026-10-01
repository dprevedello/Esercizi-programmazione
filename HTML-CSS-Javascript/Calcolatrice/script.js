// Funzione chiamata dai quattro pulsanti: "operazione" vale "+", "-", "*" oppure "/"
function calcola(operazione) {
  const primo = Number(document.getElementById("num1").value);
  const secondo = Number(document.getElementById("num2").value);
  let messaggio;

  if (operazione === "+") {
    messaggio = "Risultato: " + (primo + secondo);
  } else if (operazione === "-") {
    messaggio = "Risultato: " + (primo - secondo);
  } else if (operazione === "*") {
    messaggio = "Risultato: " + (primo * secondo);
  } else if (secondo === 0) {
    messaggio = "Errore: non si può dividere per zero";
  } else {
    messaggio = "Risultato: " + (primo / secondo);
  }

  document.getElementById("risultato").textContent = messaggio;
}
