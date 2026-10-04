<?php
require __DIR__ . "/comune.php";

$u = richiediUtente();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    header("Allow: POST");
    exit("Metodo non consentito.");
}

$stmt = db()->prepare("DELETE FROM annunci WHERE id = :id AND id_utente = :utente");
$stmt->execute(["id" => (int) ($_POST["id"] ?? 0), "utente" => $u["id"]]);

if ($stmt->rowCount() === 1) {
    flash("ok", "Annuncio eliminato.");
} else {
    flash("ko", "Annuncio non trovato.");   // non esiste oppure è di un altro utente
}
header("Location: index.php");
exit;
