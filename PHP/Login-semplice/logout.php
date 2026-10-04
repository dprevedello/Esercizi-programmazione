<?php
session_start();

// Si svuota l'array della sessione, si elimina il cookie di sessione e si distrugge la sessione
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $p = session_get_cookie_params();
    setcookie(session_name(), "", time() - 3600, $p["path"], $p["domain"], $p["secure"], $p["httponly"]);
}
session_destroy();

header("Location: login.php");
exit;
