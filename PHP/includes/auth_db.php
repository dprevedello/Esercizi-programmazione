<?php
// Controllo degli accessi per gli esercizi con il database "negozio".
// È la versione compatta di quanto scritto negli esercizi sul login: includilo come prima riga
// di ogni pagina (avvia anche la sessione).
session_start();

// Restituisce ["id" => ..., "username" => ..., "ruolo" => ...] dell'utente autenticato, oppure null
function utenteCorrente(): ?array
{
    if (!isset($_SESSION["utente_id"])) {
        return null;
    }
    return [
        "id"       => $_SESSION["utente_id"],
        "username" => $_SESSION["utente_username"],
        "ruolo"    => $_SESSION["utente_ruolo"],
    ];
}

// Memorizza nella sessione l'utente appena autenticato (riga della tabella utenti)
function accedi(array $utente): void
{
    session_regenerate_id(true);
    $_SESSION["utente_id"]       = (int) $utente["id"];
    $_SESSION["utente_username"] = $utente["username"];
    $_SESSION["utente_ruolo"]    = $utente["ruolo"];
}

// Chiude la sessione ed elimina il cookie di sessione
function esci(): void
{
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $p = session_get_cookie_params();
        setcookie(session_name(), "", time() - 3600, $p["path"], $p["domain"], $p["secure"], $p["httponly"]);
    }
    session_destroy();
}

// Se non c'è un utente autenticato porta al login (ricordando solo il nome del file richiesto)
function richiediLogin(): void
{
    if (utenteCorrente() === null) {
        $_SESSION["dopo_login"] = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        header("Location: login.php");
        exit;
    }
}

// Permette l'accesso solo agli utenti con il ruolo indicato (altrimenti 403)
function richiediRuolo(string $ruolo): void
{
    richiediLogin();
    if ($_SESSION["utente_ruolo"] !== $ruolo) {
        http_response_code(403);
        echo "<!DOCTYPE html><html lang=\"it\"><head><meta charset=\"UTF-8\"><title>Accesso negato</title>";
        echo "<link rel=\"stylesheet\" href=\"../includes/stile.css\"></head><body><main>";
        echo "<h1>Accesso negato</h1><p class=\"messaggio ko\">Questa pagina è riservata agli utenti con ruolo «" . htmlspecialchars($ruolo) . "».</p>";
        echo "<p><a href=\"index.php\">&larr; Torna alla home</a></p></main></body></html>";
        exit;
    }
}
