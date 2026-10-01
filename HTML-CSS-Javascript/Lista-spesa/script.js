// Il vero elenco: un array di testi
let prodotti = [];

const campo = document.getElementById("prodotto");
const lista = document.getElementById("lista");
const totale = document.getElementById("totale");

// Ridisegna la lista nella pagina a partire dall'array
function mostraLista() {
  let righe = "";

  for (let i = 0; i < prodotti.length; i++) {
    righe = righe + "<li>" + prodotti[i] + "</li>";
  }

  lista.innerHTML = righe;
  totale.textContent = "Prodotti: " + prodotti.length;
}

function aggiungi() {
  const nome = campo.value.trim();

  if (nome !== "") {
    prodotti.push(nome);
    mostraLista();
  }

  campo.value = "";
  campo.focus();
}

function svuota() {
  prodotti = [];
  mostraLista();
}

document.getElementById("aggiungi").addEventListener("click", aggiungi);
document.getElementById("svuota").addEventListener("click", svuota);
