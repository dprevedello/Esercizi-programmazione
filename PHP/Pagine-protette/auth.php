<?php
// File da includere all'inizio di ogni pagina: avvia la sessione e offre le funzioni di controllo.
session_start();

// Restituisce i dati dell'utente autenticato oppure null
function utenteCorrente(): ?array
{
    if (!isset($_SESSION["utente"])) {
        return null;
    }
    return ["nome" => $_SESSION["utente"], "ruolo" => $_SESSION["ruolo"]];
}

// Se non c'è un utente autenticato porta al login, ricordando la pagina richiesta
function richiediLogin(): void
{
    if (utenteCorrente() === null) {
        // Si ricorda solo il nome del file: mai un indirizzo arbitrario (rischio di redirect verso altri siti)
        $_SESSION["dopo_login"] = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        header("Location: login.php");
        exit;
    }
}

// Permette l'accesso solo agli utenti con il ruolo indicato
function richiediRuolo(string $ruolo): void
{
    richiediLogin();
    if ($_SESSION["ruolo"] !== $ruolo) {
        http_response_code(403);   // 403 = accesso vietato
        echo "<!DOCTYPE html><html lang=\"it\"><head><meta charset=\"UTF-8\"><title>Accesso negato</title>";
        echo "<link rel=\"stylesheet\" href=\"../includes/stile.css\"></head><body><main>";
        echo "<h1>Accesso negato</h1><p class=\"messaggio ko\">Questa pagina è riservata agli utenti con ruolo «" . htmlspecialchars($ruolo) . "».</p>";
        echo "<p><a href=\"index.php\">&larr; Torna alla home</a></p></main></body></html>";
        exit;
    }
}
