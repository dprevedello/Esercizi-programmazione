// Scrive (o cancella, se il messaggio è vuoto) l'errore sotto un campo
function mostraErrore(campo, messaggio) {
  document.getElementById("errore-" + campo).textContent = messaggio;
}

function controlla(evento) {
  evento.preventDefault();   // il modulo non viene inviato

  let errori = 0;
  const username = document.getElementById("username").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const conferma = document.getElementById("conferma").value;
  const regolamento = document.getElementById("regolamento");
  const esito = document.getElementById("esito");

  if (username.length < 4) {
    mostraErrore("username", "Almeno 4 caratteri");
    errori++;
  } else {
    mostraErrore("username", "");
  }

  if (!(email.includes("@") && email.includes("."))) {
    mostraErrore("email", "Email non valida");
    errori++;
  } else {
    mostraErrore("email", "");
  }

  if (password.length < 8) {
    mostraErrore("password", "Almeno 8 caratteri");
    errori++;
  } else {
    mostraErrore("password", "");
  }

  if (conferma !== password) {
    mostraErrore("conferma", "Le password non coincidono");
    errori++;
  } else {
    mostraErrore("conferma", "");
  }

  if (!regolamento.checked) {
    mostraErrore("regolamento", "Devi accettare il regolamento");
    errori++;
  } else {
    mostraErrore("regolamento", "");
  }

  if (errori === 0) {
    esito.textContent = "Registrazione completata! Benvenuto, " + username + ".";
    esito.className = "ok";
  } else {
    esito.textContent = "Correggi gli errori evidenziati.";
    esito.className = "ko";
  }
}

document.getElementById("modulo").addEventListener("submit", controlla);
