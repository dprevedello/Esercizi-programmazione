// Funzione chiamata dal pulsante "Mostra"
function mostraTabellina() {
  const numero = Number(document.getElementById("numero").value);
  let righe = "";

  for (let i = 1; i <= 10; i++) {
    righe = righe + "<li>" + numero + " × " + i + " = " + (numero * i) + "</li>";
  }

  document.getElementById("elenco").innerHTML = righe;
}

document.getElementById("mostra").addEventListener("click", mostraTabellina);
